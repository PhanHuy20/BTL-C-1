<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Cho phép fill dữ liệu vào cột name
    protected $fillable = ['name'];

    // Quan hệ: 1 Category có nhiều Motorcycle
    public function motorcycles()
    {
        return $this->hasMany(Motorcycle::class);
    }
}
