<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    protected $fillable = [
        'id', 'name', 'order'
    ];
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
