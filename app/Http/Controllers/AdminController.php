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
        $model1 = new Order();
        $model2 = new Rating();
        $model3 = new User();
        $model4 = new Message();
        $data['fruits'] = $model->getAll()->count();
        $data['orders'] = $model1->getAll()->count();
        $data['users'] = $model3->getAll()->count();
        $data['profit'] = $model1->profitLastWeek();
        $data['recentReviews'] = $model2->ratingsLastWeek();
        $data['messages'] = $model4->getLatestMessages();
        return view('pages.admin.admin',$data);
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
