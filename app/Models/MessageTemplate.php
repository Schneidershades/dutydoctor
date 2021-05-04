<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon;
use App\Models\Message;
use App\Models\MessageEvent;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Message\MessageTemplateResource;
use App\Http\Resources\Message\MessageTemplateCollection;

class MessageTemplate extends Model
{

    use HasFactory;

    public $oneItem = MessageTemplateResource::class;
    public $allItems = MessageTemplateCollection::class;

/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'message_templates';

    public function getNotificationEvents(){
        return MessageEvent::where('template_id', $this->attributes['id'])->get();
    }

    public function deleteAllNotificationEvents(){
        $events = $this->getNotificationEvents();
        foreach($events as $event){ $event->delete(); }
    }

    public function generateMessage(
      $event_name,
      $sender_id,
      $sender_name,
      $destination_id,
      $destination_name,
      $component,
      $attributes=null
    ){

        $actual_attributes = [];
        if (isset($component->attributes)){
            $actual_attributes = $component->attributes;
        }

        if ($attributes!=null && is_array($attributes)) {
            foreach($attributes as $attribute){
                if (isset($attribute->attributes) && is_array($attribute->attributes)){
                $actual_attributes = array_merge($actual_attributes, $attribute->attributes);
            }
        }
        }elseif ($attributes!=null && isset($attributes->attributes)){
            $actual_attributes = array_merge($actual_attributes, $attributes->attributes);
        }

        $msg = new Message();
        $msg->sender = $sender_name;
        $msg->sender_user_id = $sender_id;
        $msg->destination = $destination_name;
        $msg->destination_customer_id = $destination_id;
        $msg->msg_type = $this->attributes['msg_type'];
        $msg->event_name = $event_name;
        $msg->is_system = ($sender_id==0);
        $msg->status = 'not-sent';
        $msg->loan_id = $component instanceof \App\Loan ? $component->id:0;
        $msg->customer_id = $component instanceof \App\Customer ? $component->id:0;
        $msg->loan_offer_id = $component instanceof \App\LoanOffer ? $component->id:0;
        $msg->loan_request_id = $component instanceof \App\LoanRequest ? $component->id:0;
        $msg->title = $this->replaceVariablesInTemplate($this->attributes['title'], $actual_attributes);
        $msg->content = $this->replaceVariablesInTemplate($this->attributes['content'], $actual_attributes);
        $msg->requested_at = Carbon\Carbon::now();
        $msg->save();

        return $msg;
    }



    /**
     * A function to fill the template with variables, returns filled template.
     *
     * @param string $template A template with variables placeholders {$varaible}.
     * @param array $variables A key => value store of variable names and values.
     *
     * @return string
     */
    private function replaceVariablesInTemplate($template, array $variables){

        return preg_replace_callback('#{(.*?)}#',
            function($match) use ($variables){
                if (isset($variables[$match[1]])){
                    return $variables[$match[1]];
                }else{
                    return "{error:sub-not-found}";
                }
            },' '.$template.' '
        );
        
    }


}
