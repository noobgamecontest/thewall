<?php

namespace App\Observers;

use App\Models\Sentence;

class SentenceObserver
{
    /**
     * Handle the app sentence "created" event.
     *
     * @param  Sentence  $sentence
     * @return void
     */
    public function created(Sentence $sentence)
    {
        $minViews = $sentence->newQuery()
            ->where('id', '!=', $sentence->id)
            ->min('views');

        $sentence->increment('views', $minViews);
    }
}
