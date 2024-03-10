<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function fruits()
    {
        return $this->hasMany(Fruit::class,'id_category');
    }
    public function getAll(){
        return Category::with('fruits')->get();
    }
}
