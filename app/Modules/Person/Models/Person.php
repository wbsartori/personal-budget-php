<?php

namespace App\Modules\Person\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'name','birthDate','gender','email','status','createdAt','updatedAt'
    ];
}
