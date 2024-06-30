<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'city',
        'region',
        'address',
        'post_code',
        'phone_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
