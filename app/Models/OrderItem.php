<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table='order_item';
    protected $fillable = ['id_order', 'id_fruits', 'quantity', 'price'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function fruit()
    {
        return $this->belongsTo(Fruit::class);
    }

    public function insertForOrder($id,$fruits){
        try {
            foreach ($fruits as $fruit) {
                OrderItem::create([
                    'id_order' => $id,
                    'id_fruits' => $fruit->fruits->id,
                    'quantity' => $fruit->quantity,
                    'price' => $fruit->fruits->prices->sortByDesc('date_from')->first()->price
                ]);
            }
        } catch (\Exception $e) {
            dd($e);
            return false;
        }

        return true;

    }

}
