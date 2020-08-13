<?php

namespace App;

use App\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    const PRODUCT_AVAILABLE = 'disponible';
    const PRODUCT_NOT_AVAILABLE = 'no disponible';

    const PRODUCT_ON_SALE = 'en oferta';
    const PRODUCT_NOT_ON_SALE = 'no hay oferta';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'on_sale',
        'status',
        'record',
        'price',
        'image',

    ];

    public function disponibilidad()
    {
        return $this->status == Product::PRODUCT_AVAILABLE;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
