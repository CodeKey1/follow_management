<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportRequest;
use App\Models\Import;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImportController extends Controller
{
    //
    public function index()
    {
        $users = User::select()->where('cat_name',Auth::user()->cat_name )->get();
        $imports = Import::select()->where('cat_name',Auth::user()->cat_name )->get();
        return view('admin.import.import', compact('imports','users'));
    }

    public function topics()
    {

        $imports = Import::select()->where('cat_name',Auth::user()->cat_name )->get();
        return view('admin.import.import', compact('imports'));
    }

    public function create()
    {
        $users = User::select()->where('cat_name',Auth::user()->cat_name )->get();
        if ((!$users)) {

            return redirect()->route('admin.import.create')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
        return view('admin.import.create', compact('users'));
    }

    
    public function storeunit()
    {
        $users = User::select()->where('cat_name',Auth::user()->cat_name )->get();
        
        if ((!$users)) {

            return redirect()->route('admin.import.unit')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
        return view('admin.import.unit', compact('users'));
    }
    public function store (Request $request)
    {

        $file_extension = $request->file->getclientoriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'files/import';
        $request->file->move($path, $file_name);

        try {

            Unit::create(([
                'received_date' => $request['received_date'],
                'import_num' => $request['import_num'],
                'side_import' => $request['side_import'],
                'follow_date' => $request['follow_date'],
                'topic' => $request ['topic'],
                'last_topic' => $request ['last_topic'],
                'sign' => $request ['sign'],
                'notes' => $request ['notes'],
                'users_name' => $request ['users_name'],
                'cat_name' => $request ['cat_name'],
                'file' => $file_name
            ]));

            return redirect()->route('admin.imports')->with(['success' => 'تم حفظ الملف الوارد بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.imports')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);

        }

    }
    public function save(ImportRequest $request)
    {

        $file_extension = $request->upload_f->getclientoriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'files/import';
        $request->upload_f->move($path, $file_name);

        try {

            Import::create(([
                'name' => $request['name'],
                'send_to' => $request['send_to'],
                'received_date' => $request['received_date'],
                'requested_date' => $request['requested_date'],
                'details' => $request ['details'],
                'state' => $request ['state'],
                'users_name' => $request ['users_name'],
                'cat_name' => $request ['cat_name'],
                'upload_f' => $file_name
            ]));

            return redirect()->route('admin.imports')->with(['success' => 'تم حفظ الملف الوارد بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.imports')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);

        }

    }

    public function edit($id)
    {
        $users = User::select()->where('cat_name',Auth::user()->cat_name )->get();
        $imports = Import::select()->find($id);
        if (!$imports) {
            return redirect()->route('admin.import')->with(['error' => 'هذه الملف غير موجوده']);
        }

        return view('admin.import.edit', compact('imports' , 'users'));

    }

    public function update(ImportRequest $request, $id)
    {
        $file_extension = $request->upload_f->getclientoriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'files/import';
        $request->upload_f->move($path, $file_name);

        try {
            $imports = Import::find($id);
            if (!$imports) {
                return redirect()->route('admin.imports.edit', $id)->with(['error' => 'هذه الملف الصادر غير موجوده']);
            }

            $imports -> update(([
                'name' => $request['name'],
                'send_to' => $request['send_to'],
                'received_date' => $request['received_date'],
                'requested_date' => $request['requested_date'],
                'details' => $request ['details'],
                'state' => $request ['state'],
                'users_name' => $request ['users_name'],
                'cat_name' => $request ['cat_name'],
                'upload_f' => $file_name
            ]));

            return redirect()->route('admin.imports')->with(['success' => 'تم تعديل الملف الصادر بنجاح']);

        } catch (\Exception $ex) {

            return redirect()->route('admin.imports')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }


    }

    public function destroy($id)
    {

        try {
            $imports = Import::find($id);
            if (!$imports) {
                return redirect()->route('admin.imports', $id)->with(['error' => 'هذه الملف الصادر غير موجوده']);
            }
            $imports->forcedelete();

            return redirect()->route('admin.imports')->with(['success' => 'تم حذف الملف الصادر بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.imports')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function archive($id)
    {

        try {
            $imports = Import::find($id);
            if (!$imports) {
                return redirect()->route('admin.imports', $id)->with(['error' => 'هذه الملف الصادر غير موجوده']);
            }
            $imports->delete();

            return redirect()->route('admin.imports')->with(['success' => 'تم نقل الي الارشيف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.imports')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function show($id)
    {
        $imports = Import::select()->find($id);

        if (!$imports) {
            return redirect()->route('admin.import')->with(['error' => 'هذه الملف غير موجوده']);
        }

        return view('admin.import.show', compact('imports'));
    }

    public function print($id)
    {
        $imports = Import::select()->find($id);
        return view('admin.import.Print_import',compact('imports'));
    }

    public function prints ($id)
    {
        $imports = Import::select()->find($id);

        if (!$imports) {
            return redirect()->route('admin.import')->with(['error' => 'هذه الملف غير موجوده']);
        }

        return view('admin.import.show', compact('imports'));
    }

}


