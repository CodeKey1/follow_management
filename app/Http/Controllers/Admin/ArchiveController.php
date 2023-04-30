<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Export;
use App\Models\Import;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    //
    public function import(){
//->where('cat_name','المتابعة')
        $imports = Import::onlyTrashed()->where('cat_name',Auth::user()->cat_name )->get();
        return view('admin.archive.import_archive', compact('imports'));
    }
    public function export(){

        $exports = Export::onlyTrashed()->where('cat_name',Auth::user()->cat_name )->get();
        return view('admin.archive.export_archive', compact('exports'));
    }
    public function task(){

        $tasks = Import::onlyTrashed()->where('cat_name',Auth::user()->cat_name )->get();
        return view('admin.archive.task_archive', compact('tasks'));
    }
    public function topic(){

        $topics = Topic::onlyTrashed()->where('cat_name',Auth::user()->cat_name )->get();
        return view('admin.archive.topics_archive', compact('topics'));
    }
    public function board(){

        $boards = Board::onlyTrashed()->where('cat_name',Auth::user()->cat_name )->get();
        return view('admin.archive.board_archive', compact('boards'));
    }
}
