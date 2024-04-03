<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'amount'
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
