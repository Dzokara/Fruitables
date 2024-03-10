<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function insertRating(Request $request){

    $model = new Rating();

    $fruit = $request->input('fruitId');
    $starsSelected = $request->input('starsSelected');
    $desc = $request->input('reviewDesc');
    $user = $request->session()->get('user')->id;

    $inserted = $model->insertReviews($fruit,$user,$starsSelected,$desc);

    if ($inserted) {
        return response()->json(['success' => true, 'message' => 'Review inserted successfully','data'=>$model->getReviews($fruit)]);
    } else {
        return response()->json(['success' => false, 'message' => 'Failed to insert review']);
    }

    }
}
