<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemLot extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted()
    {
        static::addGlobalScope(new SoftDeletingScope);
    }


    public function item()
    {
        return $this->belongsTo('App\Models\Inventory\Item');
    }

    public function purchase_entry()
    {
        return $this->belongsTo('App\Models\MoneyOut\PurchaseEntry');
    }
}
