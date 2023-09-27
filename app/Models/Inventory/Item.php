<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted()
    {
        static::addGlobalScope(new SoftDeletingScope);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Inventory\ItemCategory');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Inventory\Unit');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Inventory\Brand');
    }
}
