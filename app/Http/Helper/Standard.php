<?php


namespace App\Http\Helper;


class Standard
{
    public static function locale()
    {
        return request()->cookie('my_locale',config('app.locale'));
    }

    public static function months(){
        return '[0,"Yanvar","Fevral","Mart","Aprel","May","İyun","İyul","Avqust","Sentyabr","Oktyabr","Noyabr","Dekabr"]';
    }

    public static function monthList(){
        return [1,2,3,4,5,6,7,8,9,10,11,12];
    }

    public static function getMonth($day){
        if ($day == "01") {
            return 1;
        }
        else if ($day == "02") {
            return 2;
        }
        else if ($day == "03") {
            return 3;
        }
        else if ($day == "04") {
            return 4;
        }
        else if ($day == "05") {
            return 5;
        }
        else if ($day == "06") {
            return 6;
        }
        else if ($day == "07") {
            return 7;
        }
        else if ($day == "08") {
            return 8;
        }
        else if ($day == "09") {
            return 9;
        }
        else {
            return $day;
        }
    }
}
