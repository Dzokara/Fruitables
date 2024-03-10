<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        $id = $request->session()->get('user')->id;
        $model = new Order();
        $data['orders'] = $model->getOrdersForUser($id);

        return view('pages.orders.orders',$data);
    }
}
