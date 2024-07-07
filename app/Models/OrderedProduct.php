<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_color_id',
        'product_size_id',
        'product_material_id',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'product_color_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'product_size_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'product_material_id');
    }
}
