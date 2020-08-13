<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;

class StoryEventSubscriber{
    public function handleStoryCreator($event){
        Log::info('Inside subscriber, Story with title is '. $event->title. ' was added.');
    }

    public function handleStoryEdited($event){
        Log::info('Inside subscriber, Story with title is '. $event->title. ' was added');
    }

    public function subscribe($event){
        $event->listen (
            'App\Events\StoryCreated',
            'App\Listeners\StoryEventSubscriber@handleStoryCreator'
        );
        $event->listen(
            'App\Events\StoryEdited',
            'App\Listeners\StoryEventSubscriber@handleStoryEdited '
        );
    }
}
