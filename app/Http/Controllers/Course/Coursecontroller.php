<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Http\Traits\filetrait;
use App\Models\course;
use Illuminate\Http\Request;

class Coursecontroller extends Controller
{
    use filetrait;
    public function course_form()
    {
        return view('adminassets.assets.course.create_course');
    }

    public function postcourse(CourseRequest $request)
    {
        $extension = $request->img->getClientOriginalName();

        $filename = time() . '_course.' . pathinfo($extension , PATHINFO_EXTENSION);
        // dd($filename);
        $this->uploading($request->img , $filename , 'images/course');
        course::create([
            'name' => $request->title,
            'description' => $request->description,
            'img' => $filename,
            'price' => $request->price
        ]);

        session()->flash('success' , 'Course created successfully');

        return redirect()->back();
    }

    public function course_data()
    {
        $data = course::get();
        return view('adminassets.assets.course.course_data' , compact('data'));
    }

    public function deleting(Request $request)
    {
        $row = course::find($request->id);
        $row->delete();
        
        session()->flash('deleted' , 'Course (' . $request->id . ') deleted successfully');

        return redirect()->back();

    }

    public function update_form($course_id)
    {
        // dd($course_id);
        $data = course::find($course_id);
        // dd($data);
        return view('adminassets.assets.course.update_course' , compact('data'));
    }

    public function updatecourse(CourseUpdateRequest $request)
    {
        $course = course::find($request->id);
        
        // dd($course);
        unlink(public_path($course->img));

        $extension = $request->img->getClientOriginalName();
        
        $filename = time() . '_course.' . pathinfo($extension , PATHINFO_EXTENSION);
        
        $this->uploading($request->img , $filename , 'image/course');
        $course->update([
            'name' => $request->title,
            'description' => $request->description,
            'img' => $filename,
            'price' => $request->price
        ]);
        session()->flash('updated' , 'Course (' . $request->id . ') updated successfully');

        return redirect(route('course_data'));
    }
}
