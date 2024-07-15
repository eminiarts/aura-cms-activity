<?php

namespace Aura\Activity;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

trait LogActivity
{
    use LogsActivity;

    protected static function bootLogActivity()
    {
        static::addLogChange(new ActivityPipe());
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logExcept(['created_at', 'updated_at'])
            ->dontSubmitEmptyLogs();
    }
}
