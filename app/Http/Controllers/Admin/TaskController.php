<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Import;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Governor_signatur;

class TaskController extends Controller
{
    //
    public function index(){


        // $imports = Import::select()->where('cat_name',Auth::user()->cat_name )->get();
        // return view('admin.task.task', compact('imports'));
    }
    public function create()
    {
        return view('admin.task.create');
    }
    public function psd(){
        return view('psdview');
    }

    public function scan(string $id){
        $Gsignatur = Governor_signatur::select()->find($id);
        return view('scan',compact('Gsignatur'));
    }
}
