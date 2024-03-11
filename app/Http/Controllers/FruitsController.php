<?php

namespace App\Http\Controllers;

use App\Http\Requests\FruitRequest;
use App\Http\Requests\InsertFruitRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Fruit;
use App\Models\Image;
use App\Models\OrderItem;
use App\Models\Price;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class FruitsController extends Controller
{
    public function index(Request $request)
    {
        $model = new Fruit();
        $model1 = new Category();

        $categoryId = $request->input('category_id');
        $page = $request->input('page_number');
        $sort = $request->input('sorting_option');
        $searchQuery = $request->input('search_query');

        if ($categoryId == -1) {
            $fruits = $model->filterAndSort(null, $page, $sort, $searchQuery);
        } else {
            $fruits = $model->filterAndSort($categoryId, $page, $sort, $searchQuery);
        }

        if ($request->ajax()) {
            return Response::json(['fruits' => $fruits]);
        }

        $data['fruits'] = $model->getAll(true, 8);
        $data['featured'] = $model->getBestSellers()->take(3);
        $data['categories'] = $model1->getAll();

        return view('pages.fruits.shop', $data);
    }

    public function show($id){
        $model = new Fruit();
        $model1 = new Rating();
        if(!$model->singleProduct($id)){
            return view('404');
        }
        $data['fruit'] = $model->singleProduct($id);
        $data['related'] = $model->getCategory($data['fruit']->category->id)
            ->where('id', '!=', $data['fruit']->id);
        $data['featured'] = $model->getBestSellers()->take(3);
        $data['reviews'] = $model1->getReviews($id);
        return view('pages.fruits.show',$data);
    }

    public function deleteFruit(Request $request){
        $id = $request->input('fruit_id');
        $model = new Fruit();
        $model1 = new Price();
        $model2= new Rating();
        $model3= new Cart();
        $model4=new OrderItem();
        try{
            $delete = $model1->setNullForPrices($id);
            $delete2= $model2->deleteRatingForFruit($id);
            $delete3= $model3->deleteProductFromCart($id);
            $delete4=$model4->setNullForFruit($id);
            $delete1 = $model->deleteFruit($id);
            return redirect()->back();
        }
        catch (\Exception $e){
            Log::error($e);
            return redirect()->back();
        }

    }
    public function updateFruit($id){
        $model = new Fruit();
        $model1 = new Category();
        $data['fruit'] = $model->singleProduct($id);
        if(!$data['fruit'])
            return redirect()->route('404');
        $data['categories'] =$model1->getAll();
        return view('pages.admin.fruitUpdate',$data);
    }
    public function fruitUpdate(FruitRequest $request,$id){
        try {
            $model = new Fruit();
            $model1 = new Price();
            $model2 = new Image();
            $fruit = $model->singleProduct($id);
            $name = $request->input('name');
            $category = $request->input('category');
            $price = $request->input('price');
            $img = $request->file('image');
            $idImg = null;

            if ($fruit->prices->sortByDesc('date_from')->first()->price != $price) {
                $insert = $model1->insertPrice($id, $price);
            }
            if ($img) {
                $idImg = $model2->insertImage($img);
            }
            $model->updateFruit($id, $name, $category, $idImg);

            return redirect()->route('admin.fruits')->with('success', 'Fruit updated successfully');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'An error occurred while updating the fruit');
        }
    }
    public function insertForm(){
        $model = new Category();
        $data['categories'] = $model->getAll();
        return view('pages.admin.fruitInsert',$data);
    }
    public function insertFruit(InsertFruitRequest $request){
        $model= new Fruit();
        $model1= new Price();
        $model2= new Image();

        try {
            $name = $request->input('name');
            $category = $request->input('category');
            $price = $request->input('price');
            $img = $request->file('image');

            $idImg = $model2->insertImage($img);

            $idFruit = $model->insertFruit($name, $category, $idImg);

            $model1->insertPrice($idFruit, $price);

            return redirect()->route('admin.fruits')->with('success', 'Fruit added successfully');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'An error occurred while adding the fruit');
        }
    }
}
