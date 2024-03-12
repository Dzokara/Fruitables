<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    public function index(Request $request){
        $model = new Cart();
        $user = $request->session()->get('user')->id;
        $data['fruits'] = $model->getCartForUser($user);
        $data['subtotal'] = $model->getTotal($user);
        return view('pages.orders.cart',$data);
    }

    public function insertCart(Request $request){
        $id = $request->input('productId');
        $idUser = $request->session()->get('user')->id;
        $model = new Cart();
        $added = $model->insertCart($id,$idUser);
        if(!$added){
            return response()->json(['message' => 'The product is already in your cart!'], 200);
        }
        $model1= new ActivityLog();
        $model1->insertLog(session()->get('user')->email,2);
        return response()->json(['message' => 'Product added to cart.'],200);

    }

    public function updateQty(Request $request){
        $id = $request->input('productId');
        $idUser = $request->session()->get('user')->id;
        $qty = $request->input('quantity');

        if($qty < 1) $qty=1;

        $model = new Cart();

        $update = $model->updateQty($id,$idUser,$qty);

        if(!$update){
            return response()->json(['error' => 'Invalid product ID'], 404);
        }

        $fruits = $model->getCartForUser($idUser);

        return Response::json(['message' => 'Quantity updated successfully.','fruits'=>$fruits]);

    }

    public function deleteCart(Request $request){
        $id = $request->input('productId');
        $idUser = $request->session()->get('user')->id;

        $model = new Cart();

        $delete = $model->deleteCartRow($id,$idUser);

        if(!$delete){
            return response()->json(['error' => 'Invalid product ID'], 404);
        }

        $fruits = $model->getCartForUser($idUser);
        $model1 = new ActivityLog();
        $model1->insertLog(session()->get('user')->email,3);
        return Response::json(['message' => 'Product removed from cart successfully','fruits'=>$fruits]);

    }
}
