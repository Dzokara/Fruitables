<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use HasFactory;

    protected $table='users';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'id_img','id_role'
    ];

    public function img()
    {
        return $this->belongsTo(Image::class, 'id_img');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class, 'id_user');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function getAll($paginate=false,$perPage=8,$page=1){
        $query = User::with('img','role');

            if ($paginate) {
                return $query->paginate($perPage,['*'],'page',$page);
            }

            return $query->get();


    }

    public function getUser($email,$password)
    {

        $user = User::with('role')->where("email",$email)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }

        return null;

    }

    public function registerUser($email, $firstName, $lastName, $password, $image)
    {

        if (User::where('email', $email)->exists()) {
            return null;
        }

        $user = new User();
        $user->email = $email;
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->password = bcrypt($password);
        $user->id_role=1;

        $fileName = $image->getClientOriginalName();

        $fileName = uniqid(). '_' . now()->timestamp . '_' . $fileName;

        $image->move(public_path('assets/img'), $fileName);

        $img = new Image();
        $img->href = $fileName;
        $img->save();

        $user->id_img = $img->id;

        $user->save();

        return $user;
    }

}
