<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'middle_name',
        'last_name',
        'phone_no',
        'country',
        'ni_number',
        'image_url',
        'verification_code',
        'email',
        'password',
        'address_line1',
        'address_line2',
        'city',
        'postcode'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function accounts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Account::class);
    }



    public function documents(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Document::class)->withPivot('document_url', 'note', 'verified', 'id')->withTimestamps();
    }

    public function getFullAddressAttribute($value): string
    {
        return $this->attributes['address_line1'] . "<br>" .
            $this->attributes['address_line2'] . "<br>" .
            $this->attributes['city'] . " (" .
            $this->attributes['country'] . ")<br>" .
            $this->attributes['postcode'] . "<br>";
    }



    /*public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Transaction::class);
    }*/
}
