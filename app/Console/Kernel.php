<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;
use App\Models\Admin\Activity;
use App\Models\Admin\Booking;
use App\Models\Admin\Owner;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \Torann\Currency\Console\Update::class,
        \Torann\Currency\Console\Cleanup::class,
        \Torann\Currency\Console\Manage::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $today = Carbon::today()->format('Y-m-d');
            $activities = Activity::whereDate('end_date', '<=', $today)->get();
            foreach($activities as $activity){
                if($activity->property){
                    $activity->property->featured = 0;
                    $activity->property->save();
                }
            }
        })->daily();

        $schedule->call(function () {
            $days = get_setting('days_after_check_in', 'payment');
            $today = Carbon::today()->subdays($days);
            $bookings = Booking::whereDate('start_date', '<=', $today)->get();
            foreach($bookings as $booking){
                if(!$booking->status == 1 && $booking->completed == 1 ){
                    $owner = Owner::where('user_id', $booking->owner_id)->first();
                    if($owner->pending_balance > 0){
                    if($owner){
                        $owner->pending_balance = $owner->pending_balance - $booking->total;
                        $owner->active_balance += $booking->total;
                        $owner->save();
                        $booking->status = 1;
                        $booking->save();
                        $random= rand(000000,999999);
                        $user = User::find($booking->owner_id);
                        $trans = new Transaction;

                        $trans->user_id = $booking->owner_id;
                        $trans->ref_no = 'T-'.$random;
                        $trans->description = 'Pending balance sucessfuly transfered to active balance';
                        $trans->amount = $booking->total;
                        $trans->save();


                        $mail_data['email'] = $user->email;
                        $mail_data['admin_email'] = 'admin@hoocay.com';
                        $mail_data['site_name'] = 'hoocay.com';
                        $mail_data['first_name'] = $owner->first_name;
                        $mail_data['subject'] = 'Booking Payment Notification';
                        $mail_data['amount'] = $booking->total;




                           // Create the mail and send it
                    Mail::send('emails.pay_receive', ['mail_data' => $mail_data], function ($m) use ($mail_data) {
                        $m->from($mail_data['admin_email'], $mail_data['site_name']);
                        $m->to($mail_data['email'], $mail_data['first_name'])->subject($mail_data['subject']);
                    }); 
                    }
                }
                 }

            }
        })->daily();

    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
