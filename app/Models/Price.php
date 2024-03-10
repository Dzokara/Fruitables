<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $fillable = ['price', 'id_fruits', 'date_from', 'date_to'];

    public function fruit()
    {
        return $this->belongsTo(Fruit::class, 'id_fruits');
    }
    public function setNullForPrices($id){
        return Price::where('id_fruits', $id)->update(['id_fruits' => null]);
    }
}
