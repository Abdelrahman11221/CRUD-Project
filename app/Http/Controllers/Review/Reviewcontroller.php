<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\student_review;
use Illuminate\Http\Request;

class Reviewcontroller extends Controller
{
    //
    public function reviewform()
    {
        return view('assets.reviewform');
    }

    public function creating(ReviewRequest $request)
    {
        student_review::create([
            'std_name'=>$request->name,
            'job_title'=>$request->job_title,
            'review'=>$request->review
        ]);
        session()->flash('done' , 'Your review are sending successfuly');
        return redirect()->back();
    }

    public function getdata()
    {
        $review = student_review::get();
        return view('adminassets.assets.reviewdata' , compact('review'));
    }
}
