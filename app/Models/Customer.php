<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;


class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customers';

    protected $fillable = ['name', 'phone'];

    public function sale(): HasMany
    {
        return $this->hasMany(Sale::class, 'customer_id', 'id');
    }

    public function salesItems(): HasManyThrough
    {
        return $this->hasManyThrough(
            SaleItem::class,
            Sale::class,
            'customer_id', // Foreign key on the environments table...
            'sale_id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'id' // Local key on the environments table...
        );
    }
}
