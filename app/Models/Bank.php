<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'bank_name', 'bank_code', 'address_line1', 'address_line2', 'city', 'country', 'postcode'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Branch::class);
    }

    /**
     * @param $query
     * @param $search
     * @return mixed
     */
    public function scopeSearch($query, $search) {

        return $query
            ->orderBy('country', 'asc')
            ->where('bank_name', 'LIKE', "%{$search}%")
            ->orWhere('bank_code', 'LIKE', '%'. $search .'%')
            ->orWhere('postcode', 'LIKE', "%{$search}%")
            ->orWhere('city', 'LIKE', "%{$search}%")
            ->orWhere('country', '=', $search)
            ->paginate(15)
            ;
    }

}
