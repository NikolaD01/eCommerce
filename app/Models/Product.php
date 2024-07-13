<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price','quantity', 'thumbnail_id'];

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_sizes');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'material_product');
    }

    public function medias()
    {
        return $this->belongsToMany(Media::class, 'products_medias');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}
