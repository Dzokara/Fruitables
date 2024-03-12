<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view("pages.authentication.login");
    }

    public function login(Request $request) {
        $email = $request->get("email");
        $password = $request->get("password");

        $model = new User();
        $user = $model->getUser($email,$password);

        if ($user) {
            $request->session()->put("user", $user);
            $model1 = new ActivityLog();
            $model1->insertLog(session()->get('user')->email,1);
            return redirect()->route('home');
        } else {
            return redirect()->back()->withInput()->withErrors(['badLogin' => 'Oops.. Wrong credentials.']);
        }

    }
}
