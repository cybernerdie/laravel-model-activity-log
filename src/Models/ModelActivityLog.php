<?php

namespace Cybernerdie\ModelActivityLog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;

class ModelActivityLog extends Model
{
    use HasFactory;

    public $guarded = [];

    protected $casts = [
        'properties' => 'array',
    ];

    /**
     * Define scope to return model activity log by subject of the activity
     *
     * @param  Model  $subject
     * @return Builder $query
     */
    public function scopeSubjectBy($query, Model $subject)
    {
        return $query
            ->where('subject_type', $subject->getMorphClass())
            ->where('subject_id', $subject->getKey());
    }

    /**
     * Define scope to return model activity log by event
     *
     * @param  string  $event
     * @return Builder
     */
    public function scopeEvent(Builder $query, string $event): Builder
    {
        return $query
            ->where('event', $event);
    }

    /**
     * Return the properties of the model activity log
     *
     * @return array
     */
    public function changes()
    {
        return $this->properties;
    }
}
