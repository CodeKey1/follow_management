<?php

namespace App\Http\Controllers;

use App\Models\Export;
use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orderCharts = $this->orderChart();
        $exports_trash = Export::onlyTrashed()->where('cat_name',Auth::user()->cat_name )->count();
        $exports = Export::select()->where('cat_name',Auth::user()->cat_name )->get();
        $topics_trash = Topic::onlyTrashed()->where('cat_name',Auth::user()->cat_name )->count();
        $topics = Topic::select()->where('cat_name', Auth::user()->cat_name)->get();
        $now = Carbon::today();
        $now = Carbon::today()->format('y-m-d');
        $users = $this->userChart();
        return view('home',compact('now','users','topics_trash','topics','exports_trash','exports','orderCharts'));
    }

    public function orderChart()
    {
        $masterYear = array();
        $labelsYear = array();

        array_push($masterYear, Export::whereMonth('created_at', Carbon::now(env('timezone')))->count());
        for ($i = 1; $i <= 11; $i++)
        {
            if ($i >= Carbon::now(env('timezone'))->month)
            {
                array_push($masterYear, Export::whereMonth('created_at',Carbon::now(env('timezone'))->subMonths($i))->whereYear('created_at', Carbon::now(env('timezone'))->subYears(1))->count());
            }
            else
            {
                array_push($masterYear, Export::whereMonth('created_at', Carbon::now(env('timezone'))->subMonths($i))->whereYear('created_at', Carbon::now(env('timezone'))->year)->count());
            }
        }

        array_push($labelsYear, Carbon::now(env('timezone'))->format('M-y'));
        for ($i = 1; $i <= 11; $i++)
        {
            array_push($labelsYear, Carbon::now(env('timezone'))->subMonths($i)->format('M-y'));
        }
        return ['data' => json_encode($masterYear), 'label' => json_encode($labelsYear)];
    }

    public function userChart()
    {
        $now = Carbon::today();
        $month = [];
        $service = [];
        $user = [];
        for ($i = 0; $i < 12; $i++) {
            $end =  Topic::whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->where('state', 1)->get();
            $start =  Topic::whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->get();
            array_push($month, $now->format('M') . ' ' . $now->format('Y'));
            array_push($service, $end->count());
            array_push($user, $start->count());
            $now =  $now->subMonth();
        }

        $master['service'] = json_encode($service);
        $master['month'] = json_encode($month);
        $master['user'] = json_encode($user);
        return $master;
    }
}
