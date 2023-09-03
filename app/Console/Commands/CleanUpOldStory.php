<?php

namespace App\Console\Commands;

use App\Models\Story;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CleanUpOldStory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean-up-old-story';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up story after 24 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $twentyHoursAgo = Carbon::now()->subHours(24);

        $stories = Story::where('created_at', '<', $twentyHoursAgo);

        foreach ($stories as $story) {
            Storage::disk('public')->delete($story->image);
            $story->delete();
        }

        $this->info('Old stories clean up successfull');
    }
}
