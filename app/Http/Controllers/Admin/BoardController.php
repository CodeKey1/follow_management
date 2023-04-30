<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\BoardRequest;
use App\Models\Board;
use App\Models\Side;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class BoardController extends Controller
{
    // index
    public function index(BoardRequest $request){

        $sides = Side::select()->paginate(PAGINATION_COUNT);
        $boards = Board::select()->paginate(PAGINATION_COUNT);

        return view('executive board.index', compact('boards','sides'));
    }
    // index
    public function create(BoardRequest $request)
    {
        $sides = Side::select()->paginate(PAGINATION_COUNT);
        $boards = Board::select()->paginate(PAGINATION_COUNT);
        return view('executive board.create', compact('boards','sides'));
    }
    // index
    public function save (BoardRequest $request)
    {
        $upload = array();
        if ($files = $request->file('upload')){
         foreach ($files as $file){
            $ext = strtolower($file->getClientOriginalName());
            $file_name = time().'.'.$ext;
            $path = 'files/import';
            $file -> move($path, $file_name);
            $upload[]= $file_name;
         }
    }
        try {

            Board::create(([
                'tittle'          =>$request['tittle']  ,
                'side_id'       =>$request['side']  ,
                'time_board'       =>$request ['time_board'] ,
                'note'       =>$request ['note'] ,
                'cat_name'       =>$request ['cat_name'] ,
                'upload'      => implode('|',$upload)
            ]));
            return redirect()->route('board.create') -> with(['success' => 'تم اضافة الجهة بنجاح']);
        }
        catch (\Exception $ex)
        {return redirect()->route('board.create')->
        with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    // index
    public function side (BoardRequest  $request)
    {
        try {
             Side::create($request->except(['_token']));
            return redirect()->route('board.boards') -> with(['success' => 'تم حفظ الجهة بنجاح']);
        }
        catch (\Exception $ex)
        {
            return redirect()->route('board.boards')-> with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    // index
    public function show ($side_id)
    {

            $sides = Side::find($side_id);
            $boards = $sides -> boards;

        return view('executive board.board', compact('boards'));


    }
    // index
    public function view ($id)
    {
        $sides = Side::select()->find($id);
        if (!$sides) {
            return redirect()->route('board.boards')->with(['error' => 'هذه الجهة غير موجوده']);
        }
        return view('executive board.board', compact('sides'));
    }
    // index
    public function display (BoardRequest $request ,$id)
    {
        try {
            $boards = Board::select()->find($id);
            if (!$boards) {
                return redirect()->route('executive board.board', $id)->with(['error' => 'هذه الجهة غير موجوده']);
            }
            $boards->update($request->except('_token'));
            return redirect()->route('board.boards')->with(['success' => 'تم تعديل الجهة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('board.boards')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    public function edit($id)
    {
        $sides = Side::select()->paginate(PAGINATION_COUNT);
        $boards = Board::select()->find($id);
        if (!$boards) {
            return redirect()->route('board.boards')->with(['error' => 'هذه الملف غير موجوده']);
        }else

        return view('executive board.edit', compact('boards','sides'));
    }
    public function update(BoardRequest $request, $id)
    {
        $upload = array();
        if ($files = $request->file('upload')) {
            foreach ($files as $file) {
                $ext = strtolower($file->getClientOriginalName());
                $file_name = time() . '.' . $ext;
                $path = 'files/import';
                $file->move($path, $file_name);
                $upload[] = $file_name;
            }
        }

        try {
            $boards = Board::find($id);
            if (!$boards) {
                return redirect()->route('board.edit', $id)->with(['error' => 'هذه الملف الصادر غير موجوده']);
            }

            $boards -> update(([
                'tittle'          =>$request['tittle']  ,
                'side_id'       =>$request['side']  ,
                'time_board'       =>$request ['time_board'] ,
                'note'       =>$request ['note'] ,
                'cat_name'       =>$request ['cat_name'] ,
                'upload'      => implode('|',$upload)
            ]));

            return redirect()->route('board.boards')->with(['success' => 'تم تعديل الملف الصادر بنجاح']);

        } catch (\Exception $ex) {

            return redirect()->route('board.boards')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }


    }
    public function archive($id)
    {

        try {
            $boards = Board::find($id);
            if (!$boards) {
                return redirect()->route('board.boards', $id)->with(['error' => 'هذه الملف الصادر غير موجوده']);
            }
            $boards->delete();

            return redirect()->route('board.boards')->with(['success' => 'تم نقل الي الارشيف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('board.boards')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
}

