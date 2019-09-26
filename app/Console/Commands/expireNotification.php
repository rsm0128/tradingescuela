<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class expireNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        // $basic = BasicSetting::first();
        //     // $users = User::whereDate('expire_time','<=', date('Y-m-d H:i:s', strtotime('+10 days')))->where('payment_type','!=',null)->where('plan_status', 1)->get();
        //     $users = \App\User::where('email', 'scar20181228@gmail.com')->get();
        //     for ( $i = 0; $i < count($users); $i++ )
        //     {
        //         $user = $users[$i];
        //         try {
        //             $this->sendMail($user->email, $user->name, $basic->expire_email_subject, $basic->expire_email_text, $basic->expire_email_title);
        //         }catch(\Swift_TransportException $r){
        //             $i--;
        //             sleep(2);
        //         } catch(\Exception $e) {
        //         }
        //     }
    }
}
