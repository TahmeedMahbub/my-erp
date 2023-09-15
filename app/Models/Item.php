<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo('App\Models\ItemCategory');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Unit');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
}
