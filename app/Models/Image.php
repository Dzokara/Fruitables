<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table='img';
    protected $fillable=['href'];
    public function fruit()
    {
        return $this->hasOne(Fruit::class, 'id_img');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id_img');
    }
}
