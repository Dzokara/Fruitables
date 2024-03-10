<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view("pages.contact");
    }

    public function insertMessage(ContactRequest $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $message =$request->input('message');

        $model = new Message();

        $insert = $model->insertMessage($name,$email,$message);

        if(!$insert){
            return redirect()->back()->with(['error'=>'Oops there was an error. Try again later.']);
        }
        return redirect()->back()->with(['success'=>'Successfully sent your message.']);


    }

}
