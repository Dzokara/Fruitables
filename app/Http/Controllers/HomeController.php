<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $model = new Fruit();
        $data['fruits'] = $model->getAll(true,4);
        $data['vegetables'] = $model->getCategory(6);
        $data['bestsellers'] = $model->getBestSellers();
        return view("pages.home",$data);
    }
    public function author(){
        return view('pages.author');
    }
}
