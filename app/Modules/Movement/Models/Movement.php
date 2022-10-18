<?php

namespace App\Modules\Movement\Models;

use App\Modules\Person\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Movement extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'id','description','classification','incomeDate','value','createdAt','updatedAt'
    ];

    public function person(): HasOne
    {
        return $this->hasOne(Person::class,'id');
    }
}
