<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medias';
    protected $fillable = ['name','alt','color_id', 'path', 'extension'];
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_medias');
    }
}
