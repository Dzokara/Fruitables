<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fruit extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'id_category', 'id_img'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
    public function prices()
    {
        return $this->hasMany(Price::class, 'id_fruits');
    }
    public function rating()
    {
        return $this->hasMany(Rating::class, 'id_fruits');
    }
    public function img()
    {
        return $this->belongsTo(Image::class, 'id_img');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,'id_fruits');
    }

    public function getAll($paginate = false, $perPage = 8,$page=1)
    {
        $query = Fruit::with('prices', 'category', 'img', 'rating');

        if ($paginate) {
            return $query->paginate($perPage,['*'],'page',$page);
        }

        return $query->get();
    }
    public function getCategory($id){

        $fruits=Fruit::with('prices','category','img','rating')->where('id_category',$id)->get();
        return $fruits;
    }

    public function getBestSellers(){
        $fruits = Fruit::with('img', 'rating')
            ->join(DB::raw('(SELECT id_fruits, AVG(value) as avg_rating FROM rating GROUP BY id_fruits) as avg_ratings'), function ($join) {
                $join->on('fruits.id', '=', 'avg_ratings.id_fruits');
            })
            ->select('fruits.*', 'avg_ratings.avg_rating as average_rating')
            ->orderByDesc('avg_ratings.avg_rating')
            ->limit(6)
            ->get();

        return $fruits;
    }

    public function getRating(){
        $average = $this->rating->avg('value');
        return round($average * 2) / 2;
    }

    public function singleProduct($id){
        $fruit = Fruit::find($id);
        return $fruit;
    }

    public function filterAndSort($categoryId = null, $page = 1, $sort = null, $searchQuery = null)
    {
        $query = Fruit::with(['category', 'img', 'rating', 'prices' => function ($query) {
            $query->latest('date_from');
        }])
            ->whereExists(function ($query) {
                $query->select(\DB::raw(1))
                    ->from('prices')
                    ->whereColumn('prices.id_fruits', 'fruits.id');
            });

        if ($categoryId !== null) {
            $categoryId = (int)$categoryId;
            $query->where('id_category', $categoryId);
        }

        if ($searchQuery !== null) {
            $query->where('name', 'like', '%' . $searchQuery . '%');
        }

        if ($sort === 'desc') {
            $query->leftJoin('prices', function ($join) {
                $join->on('fruits.id', '=', 'prices.id_fruits')
                    ->whereRaw('prices.date_from = (select max(date_from) from prices where prices.id_fruits = fruits.id)');
            })
                ->orderByDesc('prices.price');
        } elseif ($sort === 'asc') {
            $query->leftJoin('prices', function ($join) {
                $join->on('fruits.id', '=', 'prices.id_fruits')
                    ->whereRaw('prices.date_from = (select max(date_from) from prices where prices.id_fruits = fruits.id)');
            })
                ->orderBy('prices.price');
        } elseif ($sort === 'rat') {
            $query->leftJoin('rating', 'fruits.id', '=', 'rating.id_fruits')
                ->select('fruits.*', \DB::raw('COALESCE(AVG(rating.value), 0) as avg_rating'))
                ->groupBy('fruits.id', 'fruits.name','fruits.id_category','fruits.id_img','fruits.created_at','fruits.updated_at')
                ->orderByDesc('avg_rating');
        }

        return $query->paginate(8, ['fruits.*'], 'page', $page);
    }

    public function deleteFruit($id)
    {
        return Fruit::where('id', $id)->delete();
    }



}
