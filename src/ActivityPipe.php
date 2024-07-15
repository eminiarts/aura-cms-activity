<?php

namespace Aura\Activity;

use Closure;
use Illuminate\Support\Arr;
use Spatie\Activitylog\Contracts\LoggablePipe;
use Spatie\Activitylog\EventLogBag;

class ActivityPipe implements LoggablePipe
{
    public function __construct() {}

    public function handle(EventLogBag $event, Closure $next): EventLogBag
    {
        Arr::set($event->changes, 'attributes.fields', $event->model->metaFields);
        Arr::set($event->changes, 'old.fields', $event->model->meta->pluck('value', 'key')->toArray());

        return $next($event);
    }
}
