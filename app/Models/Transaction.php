<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "card_id",
        'moment',
        'indicator',
        'amount',
        "type",
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    /**
     * Get all of the investments that are assigned this transaction.
     */
    public function investments(): MorphToMany
    {
        return $this->morphedByMany(Investment::class, 'transactionable');
    }
}

