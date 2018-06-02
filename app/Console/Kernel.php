<?php

namespace App\Console;

use App\Booking;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function () {
                   
            $bookings = Booking::all();

            $total = $bookings->count();

            // $dayOfWeek = Carbon::now()->dayOfWeek - 1;
            
            //     switch ($dayOfWeek) {
            //         case 1:
            //             return $day = 'Mon';
            //             break;
            //         case 2:
            //             return $day = 'Tue';
            //             break;
            //         case 3:
            //             return $day = 'Wed';
            //             break;
            //         case 4:
            //             return $day = 'Thu';
            //             break;
            //         case 5:
            //             return $day = 'Fri';
            //             break;
            //         case 6:
            //             return $day = 'Sat';
            //             break;

            //         default:
            //             return $day = 'Sun';
            //             break;
            //     }

            for ($i=0; $i < $total-1; $i++) { 
                $booked = $bookings[$i];

                $bookedDay = $booked->class->day;


                if($bookedDay = 4){

                    DB::table('bookings')->where('id',$booked)->delete();
                }
            }

        })->everyMinute(1);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
