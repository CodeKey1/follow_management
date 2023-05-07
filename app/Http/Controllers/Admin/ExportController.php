<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRequest;
use App\Models\Responsible;
use App\Models\Side;
use App\Models\Topic;
use App\Models\Export;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class ExportController extends Controller
{
    public function index()
    {
        $topics = Topic::select()->where('cat_name', Auth::user()->cat_name)->get();
        $exports_trash = Export::onlyTrashed()->where('cat_name',Auth::user()->cat_name )->count();
        $exports = Export::select()->where('cat_name',Auth::user()->cat_name )->get();
        return view('export.index', compact('exports','exports_trash','topics'));
    }
    public function archive()
    {
        $exports = Export::onlyTrashed()->where('cat_name',Auth::user()->cat_name )->get();
        return view('export.archive', compact('exports'));
    }

    public function create()
    {
        $topics = Topic::select()->with('name_side')->where('state', 1)->get();
        $side = Side::select()->get();
        $responsibles = Responsible::select()->get();
        return view('export.create', compact('responsibles','topics','side'));
    }
    public function export_internal()
    {
        $topics = Topic::select()->with('name_side')->where('state', 1)->get();
        $side = Side::select()->get();
        $responsibles = Responsible::select()->get();
        return view('export.export', compact('responsibles','topics','side'));
    }

    public function save_internal(Request $request)
    {
        $upload_f = array();
        if ($files = $request->file('upload_f')) {
            foreach ($files as $file) {
                $ext = strtolower($file->getClientOriginalName());
                $file_name = time() . '.' . $ext;
                $path = 'attatch_office/export_follow';
                $file->move($path, $file_name);
                $upload[] = $file_name;
            }
        } else {
            $upload[] = "";
        }
        try {

            for ($i = 0; $i < count($request->side_id); $i++) {
                $side_id[] = $request->side_id[$i];
                $export_no[]  = $request->export_no[$i];
                $details[]  = $request->details[$i];
                Export::create(([
                    'name'      => $request['name'],
                    'topic_id'  => $request['topic_id'],
                    'cat_name'  => $request ['cat_name'],
                    'send_date' => $request['send_date'],
                    'side_id'   => $side_id[$i],
                    'export_no' => $export_no[$i],
                    'details'   => $details[$i],
                    'upload_f'  =>implode('|', $upload),
                ]));
            }


            return redirect()->route('exports')->with(['success' => 'تم حفظ الملف الصادر بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('exports')->
            with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    public function save(Request $request)
    {
        $upload_f = array();
        if ($files = $request->file('upload_f')) {
            foreach ($files as $file) {
                $ext = strtolower($file->getClientOriginalName());
                $file_name = time() . '.' . $ext;
                $path = 'attatch_office/export_follow';
                $file->move($path, $file_name);
                $upload[] = $file_name;
            }
        } else {
            $upload[] = "";
        }
        try {
            for ($i = 0; $i < count($request->side_id); $i++) {
                $side_id[] = $request->side_id[$i];
                $export_no[]  = $request->export_no[$i];
                $details[]  = $request->details[$i];
                Export::create(([
                    'name'      => $request['name'],
                    'topic_id'  => $request['topic_id'],
                    'cat_name'  => $request ['cat_name'],
                    'send_date' => $request['send_date'],
                    'side_id'   => $side_id[$i],
                    'export_no' => $export_no[$i],
                    'details'   => $details[$i],
                    'upload_f'  =>implode('|', $upload),
                ]));

            }
            return redirect()->route('exports')->with(['success' => 'تم حفظ الملف الصادر بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('exports')->
            with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function edit($id)
    {
        $topics = Topic::select()->with('name_side')->where('state', 1)->get();
        $side = Side::select()->get();
        $responsibles = Responsible::select()->get();
        $exports = Export::select()->with('topic_export','sidename_export')->find($id);
        if (!$exports) {
            return redirect()->route('export.index')->with(['error' => 'هذه الملف غير موجوده']);
        }
        return view('export.edit', compact('exports','responsibles','side','topics'));
    }

    public function update(Request $request, $id)
    {

        $upload_f = array();
        if ($files = $request->file('upload_f')) {
            foreach ($files as $file) {
                $ext = strtolower($file->getClientOriginalName());
                $file_name = time() . '.' . $ext;
                $path = 'attatch_office/export_follow';
                $file->move($path, $file_name);
                $upload[] = $file_name;
            }
        } else {
            $upload[] = $request['file'];
        }

        // try {
            $exports = Export::find($id);
            if (!$exports) {
                return redirect()->route('admin.exports.edit', $id)->with(['error' => 'هذه الملف الصادر غير موجوده']);
            }


            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            $exports -> update(([
                'name' => $request['name'],
                'topic_id'  => $request['topic_id'],
                'send_date' => $request['send_date'],
                'export_no' => $request['export_no'],
                'side_id' => $request ['side_id'],
                'details' => $request ['details'],
                'cat_name' => $request ['cat_name'],
                'upload_f'  =>implode('|', $upload),
            ]));

            return redirect()->route('exports')->with(['success' => 'تم تعديل الملف الصادر بنجاح']);

        // } catch (\Exception $ex) {
        //     return redirect()->route('exports')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        // }


    }

    public function destroy($id)
    {

        try {
            $exports = Export::find($id);
            if (!$exports) {
                return redirect()->route('exports', $id)->with(['error' => 'هذه الملف الصادر غير موجوده']);
            }
            $exports->forcedelete();

            return redirect()->route('exports')->with(['success' => 'تم حذف الملف الصادر بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('exports')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function delete($id)
    {

        try {
            $exports = Export::find($id);
            if (!$exports) {
                return redirect()->route('exports', $id)->with(['error' => 'هذه الملف الصادر غير موجوده']);
            }
            $exports->delete();

            return redirect()->route('exports')->with(['success' => 'تم نقل الي الارشيف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('exports')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function show( $id)
    {
        $exports = Export::select()->find($id);
        if (!$exports) {
            return redirect()->route('admin.export')->with(['error' => 'هذه الملف غير موجوده']);
        }
        return view('admin.export.show', compact('exports'));
    }
}
