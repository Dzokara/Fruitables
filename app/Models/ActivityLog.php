<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    protected $table = 'user_activity';
    protected $fillable=['email','id_activity'];
    public function activity(){
        return $this->belongsTo(Activity::class,'id_activity');
    }

    public function getAll()
    {
        return ActivityLog::with('activity')->orderBy('created_at', 'desc')->paginate(6);
    }
    public function insertLog($email,$activity){
        return ActivityLog::create([
            'email'=>$email,
            'id_activity'=>$activity
        ]);
    }
}
