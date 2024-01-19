<?php

namespace App\Jobs;

use App\Models\Sport;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class DeleteOldSportsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sports = Sport::where('start_at','<',now())->get();
        foreach($sports as $sport){
            Storage::delete('public/sports/',$sport->player_a_image);
            Storage::delete('public/sports/',$sport->player_b_image);
            $sport->delete();
        }
        
    }
}
