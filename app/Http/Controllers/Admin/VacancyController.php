<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VacancyController extends Controller
{
    public function index()
    {
        return view('admin.pages.vacancies', [
            'vacancies' => Vacancy::all(),
            'setting' => Setting::find(1)
        ]);
    }

    public function addOrEdit($id)
    {
        if ($id > 0) {
            $vacancy = Vacancy::find($id);
        } else {
            $vacancy = new Vacancy();
        }

        return view('admin.pages.add_edit_vacancy', ['vacancy' => $vacancy, 'id' => $id]);
    }

    public function save(Request $request)
    {
        $validator = validator($request->all(), [
            'id' => 'required',
            'title' => 'required|string|unique:vacancies,title,' . $request->get('id') . ',id',
            'teleb' => 'required',
            'teklif' => 'required'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', $validator->errors());
            return redirect()->back();
        } else {
            if ($request->get('id') > 0) {
                $vacancy = Vacancy::find($request->get('id'));
            } else {
                $vacancy = new Vacancy();
            }

            $vacancy->title = $request->get('title');
            $vacancy->teleb = $request->get('teleb');
            $vacancy->teklif = $request->get('teklif');
            $vacancy->slug = Str::slug($request->get('title'));
            $vacancy->save();

            return redirect()->route('admin.vacancies');

        }
    }

    public function delete($id)
    {
        $vacancy = Vacancy::find($id);
        if ($vacancy) {
            $vacancy->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
