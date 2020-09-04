<?php

namespace App\Http\Controllers\Admin;

use App\Partner;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function index()
    {
        return view('admin.pages.partners', [
            'partners' => Partner::all(),
            'setting' => Setting::find(1)
        ]);
    }

    public function getPartner($id)
    {
        if ($id == "new") {
            $partner = new Partner();
        } else {
            $partner = Partner::find($id);
        }

        return view('admin.pages.partner',
            [
                'partner' => $partner,
                'id' => $id,
                'setting' => Setting::find(1)
            ]);
    }

    public function saveOrEdit(Request $request)
    {
        $validator = validator($request->all(), [
            'link' => 'required|string',
        ]);

        if ($validator->fails()) {
            session()->flash('errors', $validator->errors());
            return redirect()->back();
        } else {
            if ((int)$request->get('id') === 0) {
                $partner = new Partner();
            } else {
                $partner = Partner::find($request->get('id'));
            }

            if ($request->file('image')) {
                $imageName = time() . '.' . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('assets/images/partners/'), $imageName);
                $partner->img = $imageName;
            }

            $partner->link = $request->get('link');
            $partner->save();

            return redirect()->route('admin.partners');
        }
    }

    public function delete($id)
    {
        $validator = validator(['id' => $id], [
            'id' => 'required|integer|exists:partners,id'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', $validator->errors());
            return redirect()->back();
        } else {
            $partner = Partner::find($id);
            $partner->delete();

            return redirect()->route('admin.partners');
        }
    }
}
