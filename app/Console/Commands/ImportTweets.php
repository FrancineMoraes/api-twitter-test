<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\TwitteRepository;

class ImportTweets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:tweetes bill-gates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import 50 first twittes from bill gates.';

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
        $twittes = new TwitteRepository();
        $twittes->index();

        $this->info('Done!');
    }
}
