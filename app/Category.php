<?php

namespace App;

use App\Ad;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function ads() {
        return $this->hasMany(Ad::class);
    }
}
