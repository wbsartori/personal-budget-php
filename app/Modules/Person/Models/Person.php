<?php

namespace App\Modules\Person\Models;

use App\Modules\Income\Models\Income;
use App\Modules\Movement\Models\Movement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'name', 'birthDate', 'gender', 'email', 'status'
    ];

    public function income(): HasOne
    {
        return $this->hasOne(Income::class, 'id');
    }

    public function movement(): HasOne
    {
        return $this->hasOne(Movement::class, 'id');
    }
}
