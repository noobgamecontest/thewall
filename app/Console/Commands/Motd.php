<?php

namespace App\Console\Commands;

use App\Models\Sentence;
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
     * Execute the console command.
     *
     * @param \App\Services\DiscordService $discordService
     * @return mixed
     */
    public function handle(DiscordService $discordService)
    {
        $sentence = Sentence::where('views', Sentence::min('views'))
            ->get()
            ->random();

        $sentence->increment('views');

        return $discordService->send($sentence->content);
    }
}
