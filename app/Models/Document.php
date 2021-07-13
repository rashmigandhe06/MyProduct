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

    protected $appends = ['ext'];

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
    public function GetIsRequiredAttribute($value): string
    {
      return $this->attributes['is_required'] = $value==1 ? "Yes":"No";
    }

    /*public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }*/

    public function getExtAttribute($value): string
    {
        return strtoupper(explode('.',$this->pivot->document_url)[1]);
    }

    public function GetVerifiedAttribute($value): string
    {
        return $this->attributes['required'] = $value==1 ? "Yes":"No";
    }


}
