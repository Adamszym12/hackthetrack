<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalizationPoint extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'street_number',
        'street',
        'postal_code',
        'city',
        'is_normalized',
        'open_time',
        'close_time',
        'is_start_point',
    ];

    public function scopeUser($query, $userId)
    {
        return $query->where('user_id', '=', $userId);
    }

    public function scopeStartingPoint($query)
    {
        return $query->where('is_start_point', '=', 1);
    }

    public function scopeRegularPoints($query)
    {
        return $query->where('is_start_point', '=', 0);
    }
}
