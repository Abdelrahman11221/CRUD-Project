<?php

namespace App\Http\Controllers\Faqs;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerRequest;
use App\Http\Requests\CreatFaqRequest;
use App\Http\Requests\SaveFaqRequest;
use App\Models\faqform;
use App\Models\faq;
use Illuminate\Http\Request;

class FaqFormcontroller extends Controller
{
    //
    public function faqs(CreatFaqRequest $request)
    {
        faqform::create([
            'name' =>$request->name ,
            'email' =>$request->email,
            'question' =>$request->question
        ]);
        session()->flash('done' , 'question created successful');
        
        return redirect()->back();
    }

    public function faq_data(Request $request)
    {
        // dd($request->id);
        $questions = faqform::where('id',$request->id)->first();
        
        return view('adminassets.assets.faq_ques' , compact('questions'));
    }

    public function sending(SaveFaqRequest $request)
    {  
        faq::create([
            'question' => $request->question,
            'answer' => $request->answer
        ]);
        
        session()->flash('done', 'Answer sent successfully');
        
        return redirect()->back();
    }

    public function getdata()
    {
        $data = faqform::get();

        return view('adminassets.assets.FaqForm_data' , compact('data'));
    }

    public function getanswer()
    {
        $answers = faq::all();
        return view('adminassets.assets.Faq_ans' , compact('answers'));
        
    }

    public function formupdate($answer_id)
    {
        $answer = faq::where('id' , $answer_id)->first();
        return view('adminassets.assets.update_ans' , compact('answer'));
    }
    public function update(AnswerRequest $request)
    {
        $data = faq::find($request->id);
        $data->update([
            'answer' => $request->answer
        ]);
        session()->flash('done', 'Answer updated Successfully');
        return redirect()->route('faq_answer');
    }
}
