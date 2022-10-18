<?php

namespace App\Modules\Income\Models;

use App\Modules\Person\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Income extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'idPerson', 'description', 'incomeDate', 'value'
    ];

    public function person(): HasOne
    {
        return $this->hasOne(Person::class, 'id');
    }
}
