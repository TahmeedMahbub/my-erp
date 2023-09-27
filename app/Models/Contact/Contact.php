<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted()
    {
        static::addGlobalScope(new SoftDeletingScope);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Contact\ContactCategory');
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\Organization\Branch');
    }
}
