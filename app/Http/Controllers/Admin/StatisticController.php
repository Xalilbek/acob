<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helper\Standard;
use App\Partner;
use App\Project;
use App\UserStatistic;
use App\Vacancy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        $days = cal_days_in_month(0, $request->get('month', Carbon::now()->format('m')), Carbon::now()->format('Y'));

        $years = DB::select("select extract(year from user_in_outs.created_at) as yyyy
from user_in_outs
group by 1");

        $yearsCount = DB::select("select extract(year from user_in_outs.created_at) as yyyy,count(*) as say
from user_in_outs
group by 1");

        $monthsCount = DB::select("select extract(month from user_in_outs.created_at) as month,count(*) as say
from user_in_outs
group by 1");

        $daysCount = DB::select("SELECT dd.day, count(*) as say
FROM (
         select extract(day from user_in_outs.created_at) as day, user_in_outs.user_statistic_id
         from user_in_outs
         where extract(month from user_in_outs.created_at) = ?
           and extract(year from user_in_outs.created_at) =  ?
     ) dd
GROUP BY dd.day",[Standard::getMonth($request->get('month')),Carbon::now()->format('Y')]);

        $daysCountList = [];
        for ($i = 0; $i <= $days; $i++) {
            $checker = false;
            foreach ($daysCount as $day) {
                if ($i == $day->day) {
                    $checker = true;
                    array_push($daysCountList, $day->say);
                    break;
                }
            }
            if (!$checker) {
                array_push($daysCountList, 0);
            }
        }

        $daysCountList = '[' . implode(",", $daysCountList) . ']';

        $monthsCountList = [];
        foreach (Standard::monthList() as $month) {
            $checker = false;
            foreach ($monthsCount as $mon) {
                if ($month == $mon->month) {
                    $checker = true;
                    array_push($monthsCountList, $mon->say);
                    break;
                }
            }
            if (!$checker) {
                array_push($monthsCountList, 0);
            }
        }

        $monthsCountList = '[' . implode(",", $monthsCountList) . ']';

        $yearsCountList = [];
        foreach ($yearsCount as $y) {
            array_push($yearsCountList, $y->say);
        }
        $yearsCountList = '[' . implode(",", $yearsCountList) . ']';

        $yearsList = [];
        foreach ($years as $y) {
            array_push($yearsList, $y->yyyy);
        }
        $yearsList = '[0,' . implode(",", $yearsList) . ']';

        $daysList = [];
        for ($i = 1; $i <= $days; $i++) {
            array_push($daysList, $i);
        }
        $daysList = '[0,' . implode(",", $daysList) . ']';

        $projectsCount = Project::count();
        $partnersCount = Partner::count();
        $vacanciesCount = Vacancy::count();
        $usersCount = UserStatistic::count();

        $countries = UserStatistic::groupBy('country')->pluck('country')->toArray();
        $countryCount = UserStatistic::groupBy('country')->select(DB::raw('COUNT(*) as count'))->pluck('count')->toArray();

        $cities = UserStatistic::groupBy('city')->pluck('city')->toArray();
        $cityCount = UserStatistic::groupBy('city')->select(DB::raw('COUNT(*) as count'))->pluck('count')->toArray();

        $countryList = '"' . implode('","', $countries) . '"';
        $countryCountList = implode(',', $countryCount);

        $cityList = '"' . implode('","', $cities) . '"';
        $cityCountList = implode(',', $cityCount);

        $data = [
            'counts' => [
                'projectsCount' => $projectsCount,
                'partnersCount' => $partnersCount,
                'vacanciesCount' => $vacanciesCount,
                'usersCount' => $usersCount,
            ],
            'countryList' => $countryList,
            'countryCountList' => $countryCountList,
            'cityList' => $cityList,
            'cityCountList' => $cityCountList,
            "daysList" => $daysList,
            "yearsList" => $yearsList,
            "yearsCountList" => $yearsCountList,
            "monthsCountList" => $monthsCountList,
            "daysCountList" => $daysCountList,
            "selectedMonth" => $request->get('month')
        ];

        return view('admin.pages.statistics', [
            'statistic' => $data
        ]);
    }
}
