<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('pages.authentication.register');
    }

    public function register(RegisterRequest $request){
        $model = new User();

        $email = $request->email;
        $first_name=$request->first_name;
        $last_name=$request->last_name;
        $password=$request->password;
        $image=$request->file('image');

        $registered = $model->registerUser($email,$first_name,$last_name,$password,$image);

        if ($registered === null) {
            return redirect()->back()->withErrors(['email' => 'Email is already taken']);
        }
        return redirect()->route('login.login')->with('success', 'Registration successful. Please login.');

    }
}
