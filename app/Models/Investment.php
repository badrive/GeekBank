<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'card_id',
        'amount',
        'profit',
        'paid',
        'type',
    ];

    public function transactions()
    {
        return $this->morphToMany(Transaction::class, 'transactionable');
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
