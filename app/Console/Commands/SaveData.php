<?php

namespace App\Console\Commands;

use App\Http\Controllers\CharacterController;
use Illuminate\Console\Command;

class SaveData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pan:cook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and Save Data';

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
     * @return int
     */
    public function handle()
    {
        return app(CharacterController::class)->store();
    }
}
