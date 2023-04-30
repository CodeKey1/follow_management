<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Export;
use App\Models\Import;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $exports = Export::select()->where('cat_name',Auth::user()->cat_name )->get();
        $imports = Import::select()->where('cat_name',Auth::user()->cat_name )->get();
        $topics = Topic::select()->where('cat_name',Auth::user()->cat_name )->get();
        $users = User::select()->where('cat_name',Auth::user()->cat_name )->get();
        return view('admin.dashboard', compact('imports','exports','topics','users'));
    }
}
