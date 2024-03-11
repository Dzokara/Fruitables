<?php

namespace App\Models;

use Carbon\Carbon;
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
    public function insertPrice($id,$price){
        return Price::create([
            'price'=>$price,
            'id_fruits'=>$id,
            'date_from'=>Carbon::now()
        ]);
    }
}
