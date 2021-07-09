<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Branch extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'bank_id', 'branch_code', 'address_line1', 'address_line2', 'city', 'country', 'postcode'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bank(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }

    /**
     * @param $query
     * @param $search
     * @return mixed
     */
    public function scopeSearch($query, $search) {

       return $query
            ->orderBy('bank_id', 'asc')
            ->where('branch_code', 'LIKE', "%{$search}%")
            ->orWhere('postcode', 'LIKE', "%{$search}%")
            ->orWhere('city', 'LIKE', "%{$search}%")
            ->orWhere('country', '=', $search)
            ->orWhere('bank_id', '=', $search)
            ->paginate(15)
            ;


        /*return $res = Branch::join('banks', 'banks.id', '=', 'branches.bank_id')
            ->where('branch_code', 'LIKE', "%{$search}%")
            ->orWhere('branches.postcode', 'LIKE', "%{$search}%")
            ->orWhere('branches.city', 'LIKE', "%{$search}%")
            ->orWhere('branches.country', '=', $search)
            ->orWhere('bank_name', '=', $search)
            ->orderBy('bank_id', 'asc')
            ->paginate(15);
            print_r($res);*/

    }


}
