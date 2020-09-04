<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home', ['setting' => Setting::find(1)]);
    }

    public function saveSite(Request $request)
    {
        $setting = Setting::find(1);
        $setting->email = $request->get('email');
        $setting->mobile_phone = $request->get('mobile_phone');
        $setting->home_phone = $request->get('home_phone');
        $setting->work_times = $request->get('work_times');
        $setting->location = $request->get('location');

        if ($request->file('logo')) {
            $imageName = time().'_logo'. '.' . request()->logo->getClientOriginalExtension();
            request()->logo->move(public_path('assets/images/'), $imageName);
            $setting->logo = $imageName;
        }

        if ($request->file('main_bg')) {
            $imageName = time().'_main_bg'. '.' . request()->main_bg->getClientOriginalExtension();
            request()->main_bg->move(public_path('assets/images/'), $imageName);
            $setting->main_bg = $imageName;
        }

        $setting->save();
        return redirect()->back();
    }

    public function saveAbout(Request $request){
        $validator = validator($request->all(),[
//            'title_az' => 'required|string',
//            'title_en' => 'required|string',
//            'title_ru' => 'required|string',
//            'content_az' => 'required|string',
//            'content_en' => 'required|string',
//            'content_ru' => 'required|string',
//            'slogan_az' => 'required|string',
//            'slogan_en' => 'required|string',
//            'slogan_ru' => 'required|string',
//            'image' => 'required',
        ]);

        if ($validator->fails()) {
            session()->flash('errors', $validator->errors());
            return redirect()->back();
        }
        else {
            $about = About::find(1);
            $about->title_az = $request->get('title_az');
            $about->title_en = $request->get('title_en');
            $about->title_ru = $request->get('title_ru');

            $about->content_az = $request->get('content_az');
            $about->content_en = $request->get('content_en');
            $about->content_ru = $request->get('content_ru');

            $about->slogan_az = $request->get('slogan_az');
            $about->slogan_en = $request->get('slogan_en');
            $about->slogan_ru = $request->get('slogan_ru');

            $about->fb_url = $request->get('fb_url');
            $about->instagram_url = $request->get('instagram_url');
            $about->twitter_url = $request->get('twitter_url');
            $about->youtube_url = $request->get('youtube_url');
            $about->pinterest_url = $request->get('pinterest_url');

            if ($request->file('image')) {
                $imageName = time() . '.' . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('assets/images/'), $imageName);
                $about->image = $imageName;
            }

            $about->save();
            return redirect()->back();
        }
    }

    public function slider()
    {
        return view('admin.slider', ['setting' => Setting::find(1)]);
    }

    public function contact()
    {
        return view('admin.contact', ['setting' => Setting::find(1)]);
    }

    public function about()
    {
        return view('admin.about', ['about' => About::find(1)]);
    }

    public function services()
    {
        return view('admin.services', ['setting' => Setting::find(1)]);
    }

    public function baby()
    {
        return view('admin.baby', ['setting' => Setting::find(1)]);
    }
}
