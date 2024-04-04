<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeletesliderRequest;
use App\Http\Requests\SliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Http\Traits\filetrait;
use App\Models\slider;
use Illuminate\Http\Request;

class Slidercontroller extends Controller
{
    use filetrait;
    public function getslider()
    {
        return view('adminassets.assets.slider');
    }

    public function creating(SliderRequest $request)
    {
        $filename = $this->uploading($request->img , '_slider.' , 'images/sliders');
        slider::create([
            'title' =>$request->title,
            'subtitle' =>$request->description,
            'image'=>$filename
        ]);

        session()->flash('done' , 'The slider is creating successfuly');
        return redirect()->back();
    }
    public function sliding()
    {
        $data = slider::get();
        return view('adminassets.assets.sliderdata' , compact('data'));
    }
    
    public function deleting(DeletesliderRequest $request)
    {
        $data = slider::find($request->id);
        // dd($data);
        // unlink(public_path($data->image));
        $data->delete();
        session()->flash('deleted', "This row ( ".$request->id." ) has been deleted");
        return redirect()->back();
    }

    public function  update_form($slider_id)
    {
        // dd($slider_id);
        $data = slider::find($slider_id);
        // dd($data);
        return view('adminassets.assets.slider_update' , compact('data'));
    }

    public function updating(UpdateSliderRequest $request)
    {
        $sliders = slider::find($request->id);
        // dd($sliders , $sliders->title , $sliders->image , $request->img);
        $filename = $sliders->image;
        if (!is_null($request->img)) 
        {
            $file_name = $this->uploading($request->img , '_slider.' , 'images/sliders' , $sliders->image);
        }
        $sliders->update([
            'title' => $request->title,
            'subtitle' => $request->description,
            'image'=> (isset($file_name)) ? $file_name : $filename
        ]);

        session()->flash('updated' , 'Row ('. $request->id .') was updated');
        return redirect(route('get_slider'));
    }
}
