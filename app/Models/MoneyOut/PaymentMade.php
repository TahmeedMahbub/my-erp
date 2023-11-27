<?php

namespace App\Models\MoneyOut;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMade extends Model
{
    use HasFactory;

    public function vendor()
    {
        return $this->belongsTo('App\Models\Contact\Contact', 'vendor_id');
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\Organization\Branch', 'branch_id');
    }

    public function entries()
    {
        return $this->hasMany(PaymentMadeEntry::class);
    }
}
