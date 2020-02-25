<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    const UNITS = ['гр', 'шт'];

    public function recipes()
    {
        return $this->belongsToMany('\App\Recipe');
    }

}
