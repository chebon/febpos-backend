<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    protected $fillable = ['name'];

    public function product(): HasMany
    {
        // return $this->belongsTo(Product::class, 'id', '');
        return $this->hasMany(Comment::class, 'category_id', 'id');
    }
}
