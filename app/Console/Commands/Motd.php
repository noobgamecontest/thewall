<?php

namespace App\Console\Commands;

use App\Services\DiscordService;
use Illuminate\Console\Command;

class Motd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'motd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Balance une bouteille à la mer.';

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
     * @param \App\Services\DiscordService $discordService
     * @return mixed
     */
    public function handle(DiscordService $discordService)
    {
        $message = 'Player one, get ready !';

        return $discordService->send($message);
    }
}
