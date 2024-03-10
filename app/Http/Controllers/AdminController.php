<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Fruit;
use App\Models\Message;
use App\Models\Order;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $model = new Fruit();
        $data['fruits'] = $model->getAll();
        return view('pages.admin.fruits',$data);
    }

    public function fruits(){
        $model = new Fruit();
        $page = request('page', 1);
        $data['fruits'] = $model->getAll(true, 6, $page);
        return view('pages.admin.fruits', $data);
    }

    public function categories(){
        $model = new Category();
        $data['categories'] = $model->getAll();
        return view('pages.admin.categories',$data);
    }

    public function users(){
        $model = new User();
        $page = request('page', 1);
        $data['users'] = $model->getAll(true,6,$page);
        return view('pages.admin.users',$data);
    }

    public function orders(){
        $model = new Order();
        $page = request('page', 1);
        $data['orders'] = $model->getAll(true,6,$page);
        return view('pages.admin.orders',$data);
    }

    public function messages(){
        $model = new Message();
        $page = request('page', 1);
        $data['messages'] = $model->getAll(true,6,$page);
        return view('pages.admin.messages',$data);
    }

    public function ratings(){
        $model = new Rating();
        $page = request('page', 1);
        $data['ratings'] = $model->getAll(true,6,$page);
        return view('pages.admin.ratings',$data);
    }
}
