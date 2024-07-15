<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
class FlushSessions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'session:flush';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush all user sessions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Flush session data
        DB::table('sessions')->truncate();
        Cache::flush();

        $this->info('All user sessions have been flushed.');
        return 0;
    }
}
