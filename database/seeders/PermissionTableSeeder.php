<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

 
        // create roles and permissions
        $roleWithPermissions = [
            'customer-officer'=>['customer-list',
            'customer-view',
            'customer-edit',
            'customer-disable',
            'customer-message'],

            'professional-officer'=>['professional-list',
            'professional-view',
            'professional-edit',
            'professional-disable',
            'professional-message'],

            'service-provider-officer'=>['service-provider-list',
            'service-provider-view',
            'service-provider-edit',
            'service-provider-disable',
            'service-provider-message'],

            'product-officer'=>['product-offer-list',
            'product-offer-create',
            'product-offer-edit',
            'product-offer-delete'],

            'service-officer'=>['service-offer-list',
            'service-offer-create',
            'service-offer-edit',
            'service-offer-delete'],

            'admin'=>['platform-user-list',
            'platform-user-create',
            'platform-user-edit',
            'platform-user-delete',
            'platform-user-role-modify',
            'platform-user-permission-modify'],

            'admin'=>['role-list',
            'permission-list'],
        ];
        
        foreach ($roleWithPermissions as $role=>$permissions) {

            try{
                $dbRole = Role::findByName($role);
            }catch(RoleDoesNotExist $e) {
                $dbRole = Role::create(['name' => $role]);
            }

            foreach ($permissions as $permission){
                try{
                    $dbPerm = Permission::findByName($permission);
                }catch(PermissionDoesNotExist $e) {
                    $dbPerm = Permission::create(['name' => $permission]);
                }
                $dbRole->givePermissionTo($permission);
            }
        }

        $dbRole = Role::findByName('admin');
        if ($dbRole==null){
            $dbRole = Role::create(['name' => $role]);
        }
        $dbRole->givePermissionTo(Permission::all());
        
    }
}
