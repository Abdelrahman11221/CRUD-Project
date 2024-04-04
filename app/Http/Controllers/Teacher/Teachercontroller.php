<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Http\Traits\filetrait;
use App\Models\Category;
use App\Models\course;
use App\Models\Department;
use App\Models\teacher;
use Illuminate\Http\Request;

class Teachercontroller extends Controller
{
    use filetrait;
    public function index()
    {

        // $dept = Department::with('category')->get();
        // // $cat = Category::with('item')->get();
        // dd($dept);

        // $teacher = teacher::with('course:id,name')->select('id' , 'name' , 'course_id')->get();
        // dd($teacher);
        // $courses = course::with(['allteachers:id,name,course_id','teacher'])->select('id' , 'name')->first();
        // dd($courses);
        // foreach ($courses->allteachers as $teachers) 
        // {
        //     dump($teachers->name);
        // }
        // dd($courses->allteachers);
        // foreach ($course->teacher as $teacher)
        // {
        //     dump($teacher->name);
        // }
        // die();
        // dd($course);
        // // $teacher = teacher::with('course')->get();
        // // dd($teacher);
        
        $data_course = course::get();
        // dd($data_course);
        return view('adminassets.assets.teacher.signup_teacher' , compact('data_course'));
    }

    public function postteacher(TeacherRequest $request)
    {
        
        $extension = $request->img->getClientOriginalName();

        $filename = time() . '_teacher.' . pathinfo($extension , PATHINFO_EXTENSION);
        // dd($filename);
        $this->uploading($request->img , $filename , 'images/teacher');
        teacher::create([
            'name' => $request->name,
            'description' => $request->description,
            'course_id' => $request->course_id,
            'img' => $filename
        ]);

        session()->flash('success' , 'Teacher created successfully');

        return redirect()->back();
    }
}
