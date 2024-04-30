<?php

namespace App\Builders;

use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;

class EventBuilder extends Builder
{
    public function startsInPast($event): self
    {
        $start = $event->talks->min('start_time');
        return $this->where($start, '<', now());
    }

    public function startsInFuture($event): self
    {
        $start = $event->talks->min('start_time');
        return $this->where($start, '>=', now());
    }
}