<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Cart;
use App\Models\Image;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function deleteUser(Request $request){
        $id = $request->input('user_id');
        $model = new User();
        $model1 = new Rating();
        $model2 = new Order();
        $model3= new Cart();
        try {
            $user = $model->getUserById($id);
            if(!$user){
                return redirect()->route('404');
            }

            $orders = $model2->getOrdersForUser($id);
            if($orders->count() > 0){
                return redirect()->back()->with('error', 'Cannot delete user. User has existing orders.');
            }
            $model3->deleteCartForUser($id);
            $model1->deleteRatingForUser($id);
            $model->deleteUser($id);

            return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the user.');
        }
    }
    public function updateUser($id){
        $model = new User();
        $model1 = new Role();


        if(!$model->getUserById($id)){
            return redirect()->route('404');
        }

        $data['user'] = $model->getUserById($id);
        $data['roles'] = $model1->getAll();


        return view('pages.admin.usersUpdate',$data);
    }

    public function userUpdate(UserRequest $request, $id)
    {
        try {
            $model = new User();
            $model1 = new Image();

            if (!$model->getUserById($id)) {
                return redirect()->route('404');
            }

            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $email = $request->input('email');
            $role = $request->input('role');
            $img = $request->file('image');
            $idImg = null;

            if ($img) {
                $idImg = $model1->insertImage($img);
            }

            $model->updateUser($id, $fname, $lname, $email, $idImg, $role);

            return redirect()->route('admin.users')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the user.');
        }}
}
