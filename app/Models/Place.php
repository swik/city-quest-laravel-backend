<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MStaack\LaravelPostgis\Eloquent\PostgisTrait;

class Place extends Model
{
    use PostgisTrait;

    protected $postgisFields = [
        'location',
    ];

    /**
     * The city of the place
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
