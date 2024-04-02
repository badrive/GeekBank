<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'gender',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function create_card($balance = 0) {
        
        $card_number = random_int(10 ** 15, (10 ** 16) - 1) . '';
        while (Card::where('number', $card_number)->exists()) {
            $card_number = random_int(10 ** 15, (10 ** 16) - 1) . '';
        }
    
        $card_rib = random_int(10 ** 17, (10 ** 18) - 1) . random_int(10 ** 6, (10 ** 7) - 1);
        while (Card::where('rib', $card_rib)->exists()) {
            $card_rib = random_int(10 ** 17, (10 ** 18) - 1) . random_int(10 ** 6, (10 ** 7) - 1);
        }
    
        Card::create([
            'user_id' => $this->id,
            'number' => $card_number,
            'rib' => $card_rib,
            'code' => random_int(0, 9) . random_int(0, 9) . random_int(0, 9),
            'date' => Carbon::now()->addYears(4)->getTimestamp(),
            'balance' => $balance,
        ]);
    }
}
