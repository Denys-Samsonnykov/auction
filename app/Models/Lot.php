<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'category_id',
        'title',
        'description'
        ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
