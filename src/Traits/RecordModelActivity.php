<?php

namespace Cybernerdie\ModelActivityLog\Traits;

use Cybernerdie\ModelActivityLog\Models\ModelActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

trait RecordModelActivity
{
    /**
     * Register the necessary event listeners.
     */
    protected static function bootRecordModelActivity(): void
    {
        foreach (static::getModelEvents() as $event) {
            static::$event(function (Model $model) use ($event) {
                if (! $model->hasLoggableColumns($event)) {
                    return;
                }

                $model->recordActivity($event);
            });
        }
    }

    /**
     * Record activity for the model.
     *
     * @param  string  $event
     * @return void
     */
    public function recordActivity($event)
    {
        ModelActivityLog::create([
            'subject_id' => $this->id,
            'subject_type' => get_class($this),
            'event' => $event,
            'actor_id' => auth()->user()->id ?? null,
            'properties' => $this->activityChanges($event),
        ]);
    }

    /**
     * Get the model events to record activity for.
     *
     * @return array
     */
    protected static function getModelEvents()
    {
        if (isset(static::$eventsToRecord)) {
            return static::$eventsToRecord;
        }

        return [
            'created', 'deleted', 'updated',
        ];
    }

    /**
     * Fetch the changes to the model.
     *
     * @param  string  $event
     * @return array
     */
    protected function activityChanges($event)
    {
        $oldData = Arr::except($this->getOriginal(), static::getModelColumnsToIgnore());
        $attributes = Arr::except($this->getAttributes(), static::getModelColumnsToIgnore());

        $properties['attributes'] = $attributes;

        if ($event == 'updated') {
            $properties['old'] = $oldData;
        }

        if ($event == 'deleted') {
            $properties['old'] = $attributes;
            unset($properties['attributes']);
        }

        return $properties;
    }

    /**
     * Get the model columns to ignore.
     *
     * @return array
     */
    protected static function getModelColumnsToIgnore()
    {
        if (isset(static::$columnsToIgnore)) {
            return static::$columnsToIgnore;
        }

        return [
            'created_at', 'updated_at', 'deleted_at',
        ];
    }

    /**
     * Prevent logging event if only ignored attributes are changed
     *
     * @param  string  $event
     * @return bool
     */
    protected function hasLoggableColumns($event)
    {
        if ($event === 'deleted') {
            return true;
        }

        return (bool) count(Arr::except($this->getDirty(), static::getModelColumnsToIgnore()));
    }
}
