<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use JWTAuth;
use App\Http\Requests\User\UserRegistrationFormRequest;
use App\Http\Requests\User\UserLoginFormRequest;
use App\Http\Requests\User\UserUpdateFormRequest;

class UserController extends Controller

{
     /**
     * @OA\Post(
     *      path="/api/v1/user/register",
     *      operationId="signUp",
     *      tags={"authentication"},
     *      summary="Sign Up a new user",
     *      description="Returns a newly registered user data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UserRegistrationFormRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful signup",
     *          @OA\MediaType(
     *             mediaType="application/json",
     *         ),
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * )
     */
    public function register(UserRegistrationFormRequest $request)
    {
        $model = new User;

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        $token = JWTAuth::attempt($request->only('email', 'password'));

        return $this->authSuccessResponse($model, $token);
    }

    /**
    * @OA\Post(
    *      path="/api/v1/user/login",
    *      operationId="signIn",
    *      tags={"authentication"},
    *      summary="Sign In a registered user",
    *      description="Returns a newly registered user data",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/UserLoginFormRequest")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    * )
    */

    public function login(UserLoginFormRequest $request)
    {
        if(!$token = JWTAuth::attempt($request->only('email', 'password'))){
            return $this->authErrorResponse('Could not sign you in with those details', 401);
        }

        return $this->authSuccessResponse($request->user(), $token);
    }


    /**
    * @OA\Post(
    *      path="/api/v1/user/profile",
    *      operationId="updateUserProfile",
    *      tags={"authentication"},
    *      summary="Profile of a registered user",
    *      description="Profile of a registered user",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/UserUpdateFormRequest")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearer": {}} },
    * )
    */

    public function update(Request $request){
        $model = User::find(auth()->user()->id);

        $this->requestAndDbIntersection($request, $model, []);

        $model->save();

        return $this->showMessage('user updated');
    }

    /**
    * @OA\Post(
    *      path="/api/v1/user/logout",
    *      operationId="userLogout",
    *      tags={"authentication"},
    *      summary="Logout a registered user",
    *      description="Logout a registered user",
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearer": {}} },
    * )
    */
    public function logout()
    {
        auth()->logout();
        return response()->json([
            'code'   => $this->successStatus,
            'status' => true,
            'message'=> "Logout Success",
            'data'   => []
        ], $this->successStatus);
    }

    /**
    * @OA\Get(
    *      path="/api/v1/user/profile",
    *      operationId="userProfile",
    *      tags={"authentication"},
    *      summary="Profile of a registered user",
    *      description="Profile of a registered user",
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearer": {}} },
    * )
    */
    public function profile(){
        $user = auth()->user()->with('userable')->get();
        $user = [
            'user' => auth()->user(),
            'user_type' => auth()->user()->userable()
        ];
        return $this->showMessage($user, 201);
    }


    public function checkEmail($email)
    {
        $user = User::where('email', $email)->first();

        if(!$user){
            return $this->errorResponse($user, 401);
        }

        return $this->showMessage($user, 201);
    }

    public function checkPhone($phone)
    {
        $user = User::where('phone', $phone)->first();

        if(!$user){
            return $this->errorResponse($user, 401);
        }

        return $this->showMessage($user, 201);
    }

    public function resetEmail($email)
    {
        $user = User::where('email', $email)->first();

        if(!$user){
            return $this->errorResponse($user, 401);
        }

        return $this->showMessage($user, 201);
    }

}
