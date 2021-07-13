<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'account_id', 'tran_id', 'transaction_time', 'transaction_type', 'transaction_category', 'description', 'amount',
        'currency', 'merchant_name', 'provider_transaction_id', 'version_two_id', 'running_balance_currency', 'running_balance_amount',
        'transaction_classification', 'provider_transaction_category', 'data_source'
    ];

    public function account(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
