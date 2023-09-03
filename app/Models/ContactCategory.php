<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCategory extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo('App\Models\ContactCategory', 'parent_category_id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
