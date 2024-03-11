<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function fruits()
    {
        return $this->hasMany(Fruit::class,'id_category');
    }
    public function getAll(){
        return Category::with('fruits')->get();
    }
    public function deleteCategory($id){
        return Category::destroy($id);
    }

    public function getCategory($id){
        return Category::find($id);
    }

    public function updateCategory($name,$id){
        $category = Category::find($id);
        $category->name=$name;
        $category->save();
    }
    public function insertCategory($name){
        return Category::create([
            'name'=>$name
        ]);
    }
}
