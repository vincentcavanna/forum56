<?php

namespace App\Models;

use App\Builders\EventBuilder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public static function getSortedCurrentEvents($futureEvents = true): Collection
    {
        $events = Event::with('talks')->where('status', '=', EventStatus::Published)->get();
        $events = $events->filter(function ($event) use ($futureEvents) {
            if ($futureEvents) {
                $startDate = $event->start_date();
                return $startDate->greaterThanOrEqualTo(Carbon::now());
            } else {
                $startDate = $event->start_date();
                return $startDate->lessThan(Carbon::now());
            }
        });
        $events->sortByDesc(function (Event $event) {
            return $event->start_date();
        });
        return $events;
    }

    public function start_date(): ?Carbon
    {
        return Carbon::make($this->talks()->min('start_time'));
    }

    public function talks(): HasMany
    {
        return $this->hasMany(Talk::class);
    }

    public function newEloquentBuilder($query): EventBuilder
    {
        return new EventBuilder($query);
    }

    public function end_date(): ?Carbon
    {
        return Carbon::make($this->talks()->max('end_time'));
    }
}
