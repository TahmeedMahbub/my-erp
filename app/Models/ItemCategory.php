<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo('App\Models\ItemCategory', 'parent_category_id');
    }
}
