<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CheckPoint extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'place_id',
        'achievement_id',
        'step',
    ];

    /**
     * Place of the checkpoint
     */
    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }

    /**
     * Quest that checkpoint belongs to
     */
    public function quest(): BelongsTo
    {
        return $this->belongsTo(Quest::class);
    }
}
