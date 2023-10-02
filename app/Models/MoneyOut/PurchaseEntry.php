<?php

namespace App\Models\MoneyOut;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PurchaseEntry extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted()
    {
        static::addGlobalScope(new SoftDeletingScope);
    }

    public function purchase()
    {
        return $this->belongsTo('App\Models\MoneyOut\Purchase');
    }

    public function itemLot()
    {
        return $this->hasOne('App\Models\Inventory\ItemLot', 'purchase_entry_id');
    }
}
