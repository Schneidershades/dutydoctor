<?php

use Carbon\Carbon;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class MessagingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $template_id = DB::table('message_templates')->insertGetId([
            'title' => 'Welcome to DutyDoctor',
            'template_name' => 'New Customer Registration',
            'content' => 'Your registration with DutyDoctor has been completed. Thank you for joining.',
            'msg_type' => 'sms',
            'template_description' => 'This message is sent to a customer when they register on the platform',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $event_id = DB::table('message_events')->insertGetId([
            'event_name' => 'customer.new',
            'template_id' => $template_id,

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $customers = Customer::all();
        foreach($customers as $customer){
            $msg_id = DB::table('messages')->insertGetId([
                'sender' => 'DutyDoctor',
                'destination' => $customer->user->telephone,
                'title' => 'Welcome to DutyDoctor',
                'content' => 'Your registration with DutyDoctor has been completed. Thank you for joining.',
                'msg_type' => 'sms',
                'status' => 'new',
                'requested_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'event_name' => 'customer.new',
                'destination_customer_id' => $customer->id,
                'destination_phone' => $customer->user->telephone,
                'customer_id' => $customer->id
            ]);
        }

    }




}
