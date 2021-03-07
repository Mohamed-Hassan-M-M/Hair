<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Hair_style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $hairStylies = DB::table('hair_styles')
            ->orderBy('created_at')
            ->where('created_at','>',date("Y-m-d H:i:s",strtotime("-8 day")))
            ->select(DB::raw('DAY(created_at) as day'), DB::raw('COUNT(id) as count'))
            ->groupBy(DB::raw('DAY(created_at)'))
            ->get();
        $hairStyleChart = [];
        foreach ($hairStylies as $hairStyle)
        {
            $day = $hairStyle->day;
            if($day < 10)
            {
                $day = "0" . $day;
            }
            $hairStyleChart[$day] = $hairStyle->count;
        }
        //return [$hairStyleChart, $hairStyleChart[date("d",strtotime("-7 day"))]];
        return view('dashboard.index',compact(['hairStyleChart']));
    }
}
