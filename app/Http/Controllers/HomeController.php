<?php

namespace App\Http\Controllers;

use App\Models\Export;
use App\Models\Responsible;
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
        $now = Carbon::today();
        $sides = Side::select()->get();
        $manage = Responsible::select()->get();
        $orderCharts = $this->orderChart();
        $manageChart = $this->manageChart();
        $exports_trash = Export::onlyTrashed()->where('cat_name', Auth::user()->cat_name)->count();
        $exports = Export::select()->where('cat_name', Auth::user()->cat_name)->whereYear('send_date',$now->year)->get();
        $topics_trash = Topic::onlyTrashed()->where('cat_name', Auth::user()->cat_name)->count();
        $topics = Topic::select()->where('cat_name', Auth::user()->cat_name)->whereYear('recived_date',$now->year)->get();
        $now = Carbon::today()->format('y-m-d');
        $users = $this->userChart();
        return view('home', compact('now', 'users', 'topics_trash', 'topics', 'exports_trash', 'exports', 'orderCharts', 'sides', 'manageChart','manage'));
    }

    public function orderChart()
    {
        $now = Carbon::today();
        $master = array();
        $master1 = array();
        $master2 = array();
        $master3 = array();
        $master4 = array();
        $master5 = array();
        $master6 = array();

        array_push(
            $master,
            Topic::select()->with('name_side')->where('side_id', 1)->where('state', 1)->whereYear('recived_date',$now->year)->count(),
            Topic::select()->with('name_side')->where('side_id', 1)->where('state', 2)->whereYear('recived_date',$now->year)->count(),
            Topic::select()->with('name_side')->where('side_id', 1)->where('state', 0)->whereYear('recived_date',$now->year)->count(),
        );
        array_push(
            $master1,
            Topic::select()->with('name_side')->where('side_id', 2)->where('state', 1)->whereYear('recived_date',$now->year)->count(),
            Topic::select()->with('name_side')->where('side_id', 2)->where('state', 2)->whereYear('recived_date',$now->year)->count(),
            Topic::select()->with('name_side')->where('side_id', 2)->where('state', 0)->whereYear('recived_date',$now->year)->count(),
        );
        array_push(
            $master2,
            Topic::select()->with('name_side')->where('side_id', 3)->where('state', 1)->whereYear('recived_date',$now->year)->count(),
            Topic::select()->with('name_side')->where('side_id', 3)->where('state', 2)->whereYear('recived_date',$now->year)->count(),
            Topic::select()->with('name_side')->where('side_id', 3)->where('state', 0)->whereYear('recived_date',$now->year)->count(),
        );
        array_push(
            $master3,
            Topic::select()->with('name_side')->where('side_id', 4)->where('state', 1)->whereYear('recived_date',$now->year)->count(),
            Topic::select()->with('name_side')->where('side_id', 4)->where('state', 2)->whereYear('recived_date',$now->year)->count(),
            Topic::select()->with('name_side')->where('side_id', 4)->where('state', 0)->whereYear('recived_date',$now->year)->count(),
        );
        array_push(
            $master4,
            Topic::select()->with('name_side')->where('side_id', 5)->where('state', 1)->whereYear('recived_date',$now->year)->count(),
            Topic::select()->with('name_side')->where('side_id', 5)->where('state', 2)->whereYear('recived_date',$now->year)->count(),
            Topic::select()->with('name_side')->where('side_id', 5)->where('state', 0)->whereYear('recived_date',$now->year)->count(),
        );
        array_push(
            $master5,
            Topic::select()->with('name_side')->where('side_id', 6)->where('state', 1)->whereYear('recived_date',$now->year)->count(),
            Topic::select()->with('name_side')->where('side_id', 6)->where('state', 2)->whereYear('recived_date',$now->year)->count(),
            Topic::select()->with('name_side')->where('side_id', 6)->where('state', 0)->whereYear('recived_date',$now->year)->count(),
        );
        array_push(
            $master6,
            Topic::select()->with('name_side')->where('side_id', 7)->where('state', 1)->whereYear('recived_date',$now->year)->count(),
            Topic::select()->with('name_side')->where('side_id', 7)->where('state', 2)->whereYear('recived_date',$now->year)->count(),
            Topic::select()->with('name_side')->where('side_id', 7)->where('state', 0)->whereYear('recived_date',$now->year)->count(),
        );
        return [
            'data' => json_encode($master), 'data1' => json_encode($master1), 'data2' => json_encode($master2),
            'data3' => json_encode($master3), 'data4' => json_encode($master4), 'data5' => json_encode($master5), 'data6' => json_encode($master6)
        ];
    }
    public function userChart()
    {
        $now = Carbon::today();
        $now1 = Carbon::today();
        $month = [];
        $X = [];
        $M = [];
        $N = [];
        for ($i = $now->month; $i >=$now->month-12; $i--) {
            $now1 =  $now1->subMonth();
            $Nx =  Topic::whereMonth('created_at', $i)->whereYear('created_at', $now1->year)->where('state','<>', 1)->whereYear('recived_date',$now->year)->get();
            $Xport =  Topic::whereMonth('created_at', $i)->whereYear('created_at', $now1->year)->where('state', 1)->whereYear('recived_date',$now->year)->get();
            $Mport =  Topic::whereMonth('created_at', $i)->whereYear('created_at', $now1->year)->whereYear('recived_date',$now->year)->get();
            array_push($month, $now1->format('M') . ' ' . $now1->format('Y'));
            array_push($X, $Xport->count());
            array_push($M, $Mport->count());
            array_push($N, $Nx->count());
        }

        $master['X'] = json_encode($X);
        $master['month'] = json_encode($month);
        $master['M'] = json_encode($M);
        $master['N'] = json_encode($N);
        return $master;
    }
    public function manageChart()
    {
        $manage = array();
        for ($i = 0; $i < 12; $i++) {
            array_push($manage, Responsible::select()->get());
        }
        $master2['manage'] = json_encode($manage);
        return $master2;
    }
}
