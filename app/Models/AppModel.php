<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppModel extends Model
{
    protected $fillable = [
        'id',
        'name',
        'img_small',
        'img_medium',
        'img_big',
        'summary',
        'price',
        'amount',
        'currency',
        'term',
        'label',
        'right_label',
        'title',
        'artist',
        'category_id',
        'category_name',
        'released_date'
        
    ];
}
