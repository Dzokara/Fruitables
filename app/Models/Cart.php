<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'product_cart';
    protected $fillable = ['id_fruits','id_user','quantity'];

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
    public function fruits(){
        return $this->belongsTo(Fruit::class,'id_fruits');
    }

    public function getCartForUser($id){
        return Cart::with('user','fruits','fruits.img','fruits.prices')->where('id_user',$id)->get();
    }
    public function getTotal($id){
        $carts = Cart::with('user', 'fruits', 'fruits.img', 'fruits.prices')
            ->where('id_user', $id)
            ->get();

        $subtotal = 0;

        foreach ($carts as $cart) {
            $price = $cart->fruits->prices->sortByDesc('date_from')->first()->price;
            $subtotal += $price * $cart->quantity;
        }
        return $subtotal;
    }
    public function insertCart($id,$idUser){

        $existingCartItem = Cart::where('id_fruits', $id)
            ->where('id_user', $idUser)
            ->first();

            if($existingCartItem){
                return null;
            }

            return Cart::create([
                'id_fruits' => $id,
                'id_user' => $idUser,
                'quantity' => 1
            ]);

    }

    public function updateQty($id,$idUser,$qty){
        $id=intval($id);
        $idUser=intval($idUser);
        $qty=intval($qty);
        $cartItem = Cart::where('id_fruits',$id)->where('id_user',$idUser)->first();
        if ($cartItem==null) {
            return null;
        }

        $cartItem->quantity = $qty;
        $cartItem->save();

        return $cartItem;
    }

    public function deleteCartRow($id,$idUser){
        $cartItem = Cart::where('id_fruits', $id)->where('id_user', $idUser)->first();

        if (!$cartItem) {
            return null;
        }

        return $cartItem->delete();
    }

    public function deleteCart($fruits){
        try {

            foreach ($fruits as $fruit){
                $fruit->delete();
            }

        }
        catch(\Exception $e){
            return false;

        }
        return true;

    }

}
