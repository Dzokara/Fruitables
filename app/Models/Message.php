<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable=['name','email','message'];

    public function getAll($paginate=false,$perPage=8,$page=1){
        $query = Message::query();
        if ($paginate) {
            return $query->paginate($perPage,['*'],'page',$page);
        }

        return $query->get();

    }
    public function insertMessage($name,$email,$message){
        return Message::create([
            'name'=>$name,
            'email'=>$email,
            'message'=>$message
        ]);
    }
    public function getLatestMessages()
    {
        return Message::orderBy('created_at', 'desc')->take(3)->get();
    }

}
