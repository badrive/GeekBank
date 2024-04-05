<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
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

    /**
     * Get all of the investments for the user.
     */
    public function transactions(): HasManyThrough
    {
        return $this->hasManyThrough(Transaction::class, Card::class);
    }

    public function active_cards()
    {
        return $this->hasMany(Card::class)->where('visibility', 1);
    }

    public function balance()
    {
        $balance = 0;
        $this->active_cards->each(function ($item) use (&$balance) {
            $balance += $item['balance'];
        });
        return $balance;
    }

    public function create_bill($name, $amount)
    {
        Bill::create([
            "user_id" => $this->id,
            "name" => $name,
            "amount" => $amount,
        ]);
    }

    public function create_card(int $balance = 0)
    {

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
            'date' => Carbon::now()->addYears(4)->toDate(),
            'balance' => $balance,
        ]);
    }
}
