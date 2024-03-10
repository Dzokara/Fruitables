<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable=['id_fruits','id_user','description','value','published_at'];

    protected $table='rating';

    public function fruit(){
        return $this->belongsTo(Fruit::class,'id_fruits');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function getAll($paginate=false,$perPage=8,$page=1){
        $query= Rating::with(['user', 'user.img','fruit']);

        if ($paginate) {
            return $query->paginate($perPage,['*'],'page',$page);
        }

        return $query->get();
    }

    public function getReviews($id){
        return Rating::with(['user', 'user.img'])->where('id_fruits',$id)->get();
    }

    public function insertReviews($idFruit,$idUser,$value,$desc){
        return Rating::create([
            'id_fruits' => $idFruit,
            'id_user' => $idUser,
            'value' => $value,
            'description' => $desc,
            'published_at'=>now()
        ]);
    }
    public function ratingsLastWeek()
    {
        $weekAgo = Carbon::now()->subWeek();
        $count = Rating::where('created_at', '>=', $weekAgo)->count();

        return $count;
    }
    public function deleteRatingForFruit($id){
        return Rating::where('id_fruits',$id)->delete();
    }
}
