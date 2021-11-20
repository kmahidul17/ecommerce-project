<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Wishlist;
use Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'rating' => 'required',
            'review' => 'required',
        ]);

        $review_exist = Review::where('user_id',Auth::id())->where('product_id',$request->product_id)->first();

        if ($review_exist){
            $notification = array('message'=>'You have already reviewed this product', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        //Eloquent ORM
        Review::insert([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'review' => $request->review,
            'rating' => $request->rating,
            'review_date' => date('d-m-Y'),
            'review_month' => date('F'),
            'review_year' => date('Y'),
        ]);

        $notification = array('message'=>'Thank You For Your Review', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


}
