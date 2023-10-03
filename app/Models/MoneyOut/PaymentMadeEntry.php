<?php

namespace App\Models\MoneyOut;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMadeEntry extends Model
{
    use HasFactory;

    public function purchase()
    {
        return $this->hasOne('App\Models\MoneyOut\Purchase', 'id', 'purchase_id');
    }

    public function payment_made()
    {
        return $this->belongsTo('App\Models\MoneyOut\PaymentMade');
    }
}
