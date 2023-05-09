<?php

namespace App\Http\Controllers;

use App\Models\Export;
use App\Models\Topic;
use App\Models\Side;
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
        $sides = Side::select()->get();
        $orderCharts = $this->orderChart();
        $exports_trash = Export::onlyTrashed()->where('cat_name',Auth::user()->cat_name )->count();
        $exports = Export::select()->where('cat_name',Auth::user()->cat_name )->get();
        $topics_trash = Topic::onlyTrashed()->where('cat_name',Auth::user()->cat_name )->count();
        $topics = Topic::select()->where('cat_name', Auth::user()->cat_name)->get();
        $now = Carbon::today();
        $now = Carbon::today()->format('y-m-d');
        $users = $this->userChart();
        return view('home',compact('now','users','topics_trash','topics','exports_trash','exports','orderCharts','sides'));
    }

    public function orderChart()
    {
        $master = array();
        $master1 = array();
        $master2 = array();
        $master3 = array();
        $master4 = array();
        $master5 = array();
        $master6 = array();

        array_push($master,
        Topic::select()->with('name_side')->where('side_id',1)->where('state',1)->count(),
        Topic::select()->with('name_side')->where('side_id',1)->where('state',0)->count(),
        Topic::select()->with('name_side')->where('side_id',1)->where('state',2)->count(),
    );
        array_push($master1,
        Topic::select()->with('name_side')->where('side_id',2)->where('state',1)->count(),
        Topic::select()->with('name_side')->where('side_id',2)->where('state',0)->count(),
        Topic::select()->with('name_side')->where('side_id',2)->where('state',2)->count(),
    );
        array_push($master2,
        Topic::select()->with('name_side')->where('side_id',3)->where('state',1)->count(),
        Topic::select()->with('name_side')->where('side_id',3)->where('state',0)->count(),
        Topic::select()->with('name_side')->where('side_id',3)->where('state',2)->count(),
    );
        array_push($master3,
        Topic::select()->with('name_side')->where('side_id',4)->where('state',1)->count(),
        Topic::select()->with('name_side')->where('side_id',4)->where('state',0)->count(),
        Topic::select()->with('name_side')->where('side_id',4)->where('state',2)->count(),
    );
        array_push($master4,
        Topic::select()->with('name_side')->where('side_id',5)->where('state',1)->count(),
        Topic::select()->with('name_side')->where('side_id',5)->where('state',0)->count(),
        Topic::select()->with('name_side')->where('side_id',5)->where('state',2)->count(),
    );
        array_push($master5,
        Topic::select()->with('name_side')->where('side_id',6)->where('state',1)->count(),
        Topic::select()->with('name_side')->where('side_id',6)->where('state',0)->count(),
        Topic::select()->with('name_side')->where('side_id',6)->where('state',2)->count(),
    );
        array_push($master6,
        Topic::select()->with('name_side')->where('side_id',7)->where('state',1)->count(),
        Topic::select()->with('name_side')->where('side_id',7)->where('state',0)->count(),
        Topic::select()->with('name_side')->where('side_id',7)->where('state',2)->count(),
    );
        return ['data' => json_encode($master),'data1' => json_encode($master1),'data2' => json_encode($master2),
        'data3' => json_encode($master3),'data4' => json_encode($master4),'data5' => json_encode($master5),'data6' => json_encode($master6)];
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
