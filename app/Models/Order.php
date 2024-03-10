<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['id_user','total','address','phone','message'];

    public function items()
    {
        return $this->hasMany(OrderItem::class,'id_order');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
    public function getAll($paginate=false,$perPage=8,$page=1){
        $query = Order::with('user','user.img')->orderByDesc('created_at');

            if ($paginate) {
                return $query->paginate($perPage,['*'],'page',$page);
            }

            return $query->get();



    }
    public function getOrdersForUser($id){
        return Order::where('id_user',$id)->get();
    }

    public function insertOrder($id,$total,$address,$phone,$message){

        $order = Order::create([
            'id_user'=>$id,
            'total'=>$total,
            'address'=>$address,
            'phone'=>$phone,
            'message'=> $message ? $message : null
        ]);

        if($order){
            return $order->id;
        }
        return null;

    }
    public  function profitLastWeek()
    {
        $weekAgo = Carbon::now()->subWeek();
        $total = Order::where('created_at', '>=', $weekAgo)->sum('total');

        return $total;
    }

}
