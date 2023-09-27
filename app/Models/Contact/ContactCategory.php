<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted()
    {
        static::addGlobalScope(new SoftDeletingScope);
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Contact\ContactCategory', 'parent_category_id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Contact\Role');
    }
}
