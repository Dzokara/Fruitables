<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Fruit;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function deleteCategory(Request $request){
        $model = new Category();
        $model1 = new Fruit();
        $id = $request->input('category_id');

        try {
            $category = $model->getCategory($id);
            if(!$category){
                return redirect()->route('404');
            }

            $fruits = $model1->getCategory($id);
            if ($fruits->isNotEmpty()) {
                return redirect()->back()->with('error', 'Cannot delete category. Some fruits are associated with this category.');
            }

            $model->deleteCategory($id);
            return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the category.');
        }
    }

    public function updateCategory($id){
        $model = new Category();
        $data['category'] = $model->getCategory($id);
        return view('pages.admin.categoryUpdate',$data);
    }

    public function categoryUpdate(CategoryRequest $request,$id){
        $model = new Category();
        $name = $request->input('name');
        if(!$model->getCategory($id)){
            redirect()->route('404');
        }
        $model->updateCategory($name,$id); try {
            $model = new Category();
            $name = $request->input('name');
            if(!$model->getCategory($id)){
                redirect()->route('404');
            }
            $model->updateCategory($name, $id);

            return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update category. Please try again.');
        }
    }

    public function insertForm(){
        return view('pages.admin.categoryInsert');
    }
    public function insertCategory(CategoryRequest $request){
        try {
            $name = $request->input('name');
            $model = new Category();
            $model->insertCategory($name);

            return redirect()->route('admin.categories')->with('success', 'Category inserted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to insert category. Please try again.');
        }
    }
}
