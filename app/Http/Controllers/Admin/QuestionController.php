<?php

namespace App\Http\Controllers\Admin;

use App\Lang;
use App\Question;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function index()
    {
        return view('admin.question', [
            'questions' => Question::all(),
            'setting' => Setting::find(1)
        ]);
    }

    public function writeQuestion($id)
    {
        if ($id == "new") {
            $question = new Question();
        } else {
            $question = Question::find($id);
        }

        $langs = Lang::all();

        return view('admin.write_question',['question' => $question,'langs' => $langs,
            'setting' => Setting::find(1)]);
    }

    public function saveOrEdit(Request $request)
    {
        $validator = validator($request->all(), [
            'title' => 'required|string',
            'content' => 'required',
            'lang' => 'required'
        ]);

        if ($validator->fails()){
            session()->flash('errors',$validator->errors());
            return redirect()->back();
        }
        else{
            if ((int)$request->get('id') === 0){
                $question = new Question();
            }
            else{
                $question = Question::find($request->get('id'));
            }

            if ($request->file('image')){
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('assets/images'), $imageName);
                $question->image = $imageName;
            }

            $question->title = $request->get('title');
            $question->content = $request->get('content');
            $question->lang_id = $request->get('lang',1);
            $question->slug = Str::slug($request->get('title'));
            $question->save();

            return redirect()->route('admin.questions');
        }
    }

    public function delete($id){
        $validator = validator(['id' => $id], [
            'id' => 'required|integer|exists:questions,id'
        ]);

        if ($validator->fails()){
            session()->flash('errors',$validator->errors());
            return redirect()->back();
        }
        else{
            $question = Question::find($id);
            $question->delete();

            return redirect()->route('admin.questions');
        }
    }
}
