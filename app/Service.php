<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $fillable = [
        'id', 'service', 'area_id',
    ];
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
