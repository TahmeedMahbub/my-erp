<?php

namespace App\Models\MoneyOut;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class Purchase extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted()
    {
        static::addGlobalScope(new SoftDeletingScope);
    }

    public function entries()
    {
        return $this->hasMany(PurchaseEntry::class);
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\Contact\Contact', 'vendor_id');
    }

    public function delivery_preson()
    {
        return $this->belongsTo('App\Models\Contact\Contact', 'delivery_person_id');
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\Organization\Branch', 'branch_id');
    }

}
