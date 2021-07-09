<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'document_name', 'is_required'
    ];

    /**
     * @param $query
     * @param $search
     * @return mixed
     */
    public function scopeSearch($query, $search) {

        return $query
            ->orderBy('document_name', 'asc')
            ->Where('document_name', '=', $search)
            ->paginate(15)
            ;
    }

    /**
     * @param $value
     * @return string
     */
    public function GetIsRequiredAttribute($value)
    {
      return $this->attributes['is_required'] = $value==1 ? "Yes":"No";
    }
}
