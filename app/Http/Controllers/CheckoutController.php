<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index(Request $request){
        $model = new Cart();

        $id = $request->session()->get('user')->id;

        $data['fruits']=$model->getCartForUser($id);

        if($data['fruits']->count() < 1){
            return redirect()->route('cart');
        }

        $data['subtotal'] = $model->getTotal($id);
        return view('pages.orders.checkout',$data);
    }

    public function insertOrder(OrderRequest $request){
        $address = $request->input('address');
        $mobile = $request->input('mobile');
        $note=$request->input('notes');
        $id=$request->session()->get('user')->id;

        $model1 = new Cart();
        $cart = $model1->getCartForUser($id);
        if(!$cart){
            return redirect()->route('404');
        }

        $total = $request->input('total');
        $model = new Order();
        $model2 = new OrderItem();

        try {
            DB::transaction(function () use ($model, $model1, $model2, $id, $total, $address, $mobile, $note, $cart) {
                $insert = $model->insertOrder($id, $total, $address, $mobile, $note);
                if (!$insert) {
                    throw new \Exception('Failed to insert order');
                }

                $insert1 = $model2->insertForOrder($insert, $cart);
                if (!$insert1) {
                    throw new \Exception('Failed to insert order item');
                }

                $delete = $model1->deleteCart($cart);
                if (!$delete) {
                    throw new \Exception('Failed to delete cart');
                }

                DB::commit();
            });

            return redirect()->route('home')->with(['message' => 'Successfully ordered!']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return redirect()->route('home')->with(['message' => 'Failed to place order. Please try again later.']);
        }

    }
}
