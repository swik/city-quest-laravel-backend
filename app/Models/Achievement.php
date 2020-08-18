<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Achievement extends Model
{
    /**
     * Users that have the achievement
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
