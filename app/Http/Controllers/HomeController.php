<?php

namespace App\Http\Controllers;

use App\About;
use App\Design;
use App\Lang;
use App\Partner;
use App\Portfolio;
use App\Project;
use App\Question;
use App\Setting;
use App\UserInOut;
use App\UserStatistic;
use App\Vacancy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        $about = About::find(1);
//        $projects = Project::where('type',0)->take(6)->get();
        $partners = Partner::all();
//        $portfolios = Portfolio::take(6)->get();
        $setting['fb_url'] = $about['fb_url'];
        $setting['instagram_url'] = $about['instagram_url'];
        $setting['twitter_url'] = $about['twitter_url'];
        $setting['youtube_url'] = $about['youtube_url'];

        return view('front.home', [
            'setting' => $setting,
//            'projects' => $projects,
            'partners' => $partners,
            'about' => $about,
//            'portfolios' => $portfolios
        ]);
    }

    public function about()
    {
        $lang = Lang::where('name', app()->getLocale())->first();
        return view('front.about', [
            'setting' => Setting::find(1),
            'about' => About::find(1),
            'questions' => Question::where('lang_id', $lang->id)->get()]);
    }

    public function contact()
    {
        return view('front.contact', ['setting' => Setting::find(1)]);
    }

    public function contacts()
    {
        return view('front.contact', ['setting' => Setting::find(1)]);
    }

    public function changeLang($locale)
    {
        $cookie = cookie('my_locale', $locale, 45000);
        return redirect()->back()->cookie($cookie);
    }

    public function getPreparedProject($slug)
    {
        $type = 2;
        if ($slug === "apartments") {
            $type = 0;
        } else if ($slug === "backyard-houses") {
            $type = 1;
        }
        $projects = $this->searchProject(1);
//        if(request()->filled('room') || request()->filled('area_min') || request()->filled('area_max')
//            || request()->filled('price_min') || request()->filled('price_max') ||
//            request()->filled('area_order') || request()->filled('price_order')){
//            $projects = $projects->paginate(6);
//        }

        $projects = $projects->where('prepared_type',$type)->paginate(6)->appends(request()->query());

//        dd($projects->paginate(6));
        return view('front.prepared_projects', [
            'setting' => Setting::find(1),
            'projects' => $projects,
            'type' => $type
        ]);
    }

    public function projects()
    {

        $projects = $this->searchProject(0);

//        if(request()->filled('room') || request()->filled('area_min') || request()->filled('area_max')
//            || request()->filled('price_min') || request()->filled('price_max') ||
//            request()->filled('area_order') || request()->filled('price_order')){
//            $projects = $projects->paginate(6);
//        }

        $projects = $projects->paginate(6)->appends(request()->query());

//        dd($projects->paginate(6));
        return view('front.projects', [
            'setting' => Setting::find(1),
            'projects' => $projects,
        ]);
    }

    public function searchProject($type)
    {
        $projects = Project::where('type', $type);
        if (request('room') && (int)request('room') > 0) $projects = $projects->where('room_count', request('room'));
        if (request('area_min')) $projects = $projects->where(DB::raw('CAST(total_area as int)'), '>=', request('area_min'));
        if (request('area_max')) $projects = $projects->where(DB::raw('CAST(total_area as int)'), '<=', request('area_max'));
        if (request('price_min')) $projects = $projects->where(DB::raw('CAST(cash as int)'), '>=', request('price_min'));
        if (request('price_max')) $projects = $projects->where(DB::raw('CAST(cash as int)'), '<=', request('price_max'));
        if (request('area_order')) $projects = $projects->orderBy(DB::raw('CAST(total_area as int)'), request('area_order'));
        if (request('price_order')) $projects = $projects->orderBy(DB::raw('CAST(cash as int)'), request('price_order'));
        return $projects->orderBy('order');
    }

    public function getProject($slug)
    {
        $project = Project::where('slug', $slug)->first();

        $projects = Project::where('id', '!=', $project['id'])->where('type',$project->type)->get();

        return view('front.project', [
            'setting' => Setting::find(1),
            'project' => $project,
            'projects' => $projects
        ]);
    }

    public function portfolio()
    {
        $portfolios = Portfolio::paginate(6);
        return view('front.portfolio', [
            'setting' => Setting::find(1),
            'portfolios' => $portfolios
        ]);
    }

    public function getPortfolio($slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->first();
        return view('front.get_portfolio', [
            'setting' => Setting::find(1),
            'portfolio' => $portfolio
        ]);
    }

    public function design()
    {
        $designs = Design::with('images')->orderBy('order')->paginate(6);
        return view('front.design', [
            'setting' => Setting::find(1),
            'designs' => $designs
        ]);
    }

    public function getDesign($slug)
    {
        $design = Design::where('slug', $slug)->first();
        return view('front.get_design', [
            'setting' => Setting::find(1),
            'design' => $design
        ]);
    }

    public function faq()
    {
        $lang = Lang::where('name', app()->getLocale())->first();
        return view('front.faq', ['setting' => Setting::find(1),
            'questions' => Question::where('lang_id', $lang->id)->get()]);
    }

    public function career()
    {
        $vacancies = Vacancy::all();
        return view('front.career_list', [
            'setting' => Setting::find(1),
            'vacancies' => $vacancies
        ]);
    }

    public function getVacancy($slug)
    {
        $vacancy = Vacancy::where('slug', $slug)->first();
        return view('front.career', [
            'setting' => Setting::find(1),
            'vacancy' => $vacancy
        ]);
    }

    public function sendCV(Request $request)
    {
//        $data = array('name'=>"Virat Gandhi");
//        Mail::send('front.mail', $data, function($message) {
//            $message->to('abc@gmail.com', 'Tutorials Point')->subject
//            ('Laravel Testing Mail with Attachment');
////            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
////            $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
//            $message->from('xyz@gmail.com','Virat Gandhi');
//        });

        $validator = validator($request->all(), [
            'title' => 'required',
            'name' => 'required',
            'surname' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        } else {

            $cvFile = time() . '_cv_' . '.' . request()->cv->getClientOriginalExtension();
            request()->cv->move(public_path() . '/assets/files/', $cvFile);

            Mail::send('front.mail', [],
                function ($message) use ($request, $cvFile) {
                    $message->attach(public_path('assets/files/' . $cvFile));
                    $message->to('office@acob.az', $request->get('title') . ' Vakansiyasi')
                        ->subject($request->get('title') . ' Vakansiyasi');
                    $message->from('office@acob.az', $request->get('name') . ' ' . $request->get('surname'));
                });


            return redirect()->route('front.careers');
        }
    }

    public function visitor(Request $request)
    {
        $validator = validator($request->all(), [
            'ip_address' => 'required',
            'country' => 'string',
            'city' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {
            $userStatistic = UserStatistic::where('ip_address', $request->get('ip_address'))->first();
            if (is_null($userStatistic)) {
                $userStatistic = new UserStatistic();
                $userStatistic->ip_address = $request->get('ip_address');
                $userStatistic->country = $request->get('country');
                $userStatistic->city = $request->get('city');
                $userStatistic->save();
            }

            $userInOUt = UserInOut::whereDate('created_at', Carbon::now()->format('Y-m-d'))
                ->where('user_statistic_id', $userStatistic->id)
                ->first();

            if (is_null($userInOUt)) {
                $userInOUt = new UserInOut();
                $userInOUt->user_statistic_id = $userStatistic->id;
                $userInOUt->save();
            }

        }
    }
}
