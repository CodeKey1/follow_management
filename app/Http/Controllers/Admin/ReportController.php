<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Export;
use App\Models\Import;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    //
    public function index(){
        $topics = Topic::select()->where('cat_name',Auth::user()->cat_name )->get();
        $imports = Import::select()->where('cat_name',Auth::user()->cat_name )->get();
        $exports = Export::select()->where('cat_name',Auth::user()->cat_name )->get();
        return view('admin.reports.reports', compact('exports','topics','imports'));
    }
    public function export(){

        $exports = Export::select()->where('cat_name',Auth::user()->cat_name )->get();
        return view('admin.reports.export_reports', compact('exports'));
    }
    public function import(){

        $imports = Import::select()->where('cat_name',Auth::user()->cat_name )->get();

        return view('admin.reports.import_reports', compact('imports'));
    }
    public function topic(){
        $topics = Topic::select()->where('cat_name',Auth::user()->cat_name )->get();

        return view('admin.reports.topic_reports', compact('topics'));
    }
}
