<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRequest;
use App\Models\Responsible;
use App\Models\Side;
use Carbon\Carbon;
use App\Models\Topic;
use App\Models\Export;
use App\Models\Ts_Export;
use App\Models\Responsible_export;
use App\Models\Response_Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class ExportController extends Controller
{
    public function index()
    {
        $now = Carbon::today();
        $topics = Topic::select()->where('cat_name', Auth::user()->cat_name)->get();
        $exports_trash = Export::select()->where('state', '<>', 1)->where('cat_name', Auth::user()->cat_name)->count();
        $exports = Export::select()->where('cat_name', Auth::user()->cat_name)->get();
        $response = Ts_Export::select()->get();
        $manage = Responsible::select()->get();
        $inside_export =Response_Topic:: select()->get();
        $x_inside =Responsible_export:: select()->get();
        return view('export.index', compact('exports', 'exports_trash', 'topics', 'response', 'now', 'manage','inside_export','x_inside'));
    }
    public function archive()
    {
        $exports = Export::onlyTrashed()
            ->where('cat_name', Auth::user()->cat_name)
            ->get();
        return view('export.archive', compact('exports'));
    }

    public function create()
    {
        $topics = Topic::select()->with('name_side')->where('state', '<>', 1)->get();
        $topics_inside = Topic::select()->with('name_side')->get();
        $side = Side::select()->get();
        $responsibles = Responsible::select()->get();
        return view('export.create', compact('responsibles', 'topics', 'side','topics_inside'));
    }
    public function export_internal()
    {
        $now = Carbon::today();
        $topics = Topic::select()
            ->where('cat_name', Auth::user()->cat_name)
            ->get();
        $exports_trash = Export::select()
            ->where('state', '<>', 1)
            ->where('cat_name', Auth::user()->cat_name)
            ->count();
        $exports = Export::select()
            ->where('cat_name', Auth::user()->cat_name)
            ->get();
        $response = Ts_Export::select()->get();
        $manage = Responsible::select()->get();
        $inside_export =Response_Topic:: select()->get();
        return view('export.export', compact('exports', 'exports_trash', 'topics', 'response', 'now', 'manage','inside_export'));
    }

    public function save_internal(Request $request)
    {
        $upload_f = [];
        if ($files = $request->file('upload_f')) {
            foreach ($files as $file) {
                $ext = strtolower($file->getClientOriginalName());
                $file_name = time() . '.' . $ext;
                $path = 'attatch_office/export_follow';
                $file->move($path, $file_name);
                $upload[] = $file_name;
            }
        } else {
            $upload[] = '';
        }
        try {
            for ($i = 0; $i < count($request->side_id); $i++) {
                $side_id[] = $request->side_id[$i];
                $export_no[] = $request->export_no[$i];
                $details[] = $request->details[$i];
                Export::create([
                    'name' => $request['name'],
                    'topic_id' => $request['topic_id'],
                    'cat_name' => $request['cat_name'],
                    'send_date' => $request['send_date'],
                    'side_id' => $side_id[$i],
                    'export_no' => $export_no[$i],
                    'details' => $details[$i],
                    'upload_f' => implode('|', $upload),
                ]);
            }

            return redirect()
                ->route('exports')
                ->with(['success' => 'تم حفظ الملف الصادر بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->route('exports')
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    public function save(Request $request)
    {
        $now = Carbon::today();
        $file = [];
        if ($files = $request->file('file')) {
            foreach ($files as $file) {
                $ext = strtolower($file->getClientOriginalName());
                $file_name = time() . '.' . $ext;
                $path = 'attatch_office/export_follow';
                $file->move($path, $file_name);
                $upload[] = $file_name;
            }
        } else {
            $upload[] = '';
        }
        try {
            if ($request->side_id) {
                for ($i = 0; $i < count($request->export_no); $i++) {
                    $side_id[] = $request->side_id[$i];
                    $export_no[] = $request->export_no[$i];
                    $details[] = $request->details[$i];
                    $export = Export::create([
                        'name' => $request['name'],
                        'topic_id' => $request['topic_id'],
                        'cat_name' => $request['cat_name'],
                        'send_date' => $request['send_date'],
                        'side_id' => $side_id[$i],
                        'export_no' => $export_no[$i],
                        'details' => $details[$i],
                        'upload_f' => implode('|', $upload),
                    ]);
                    Topic::where('side_id',$export->side_id)->where('id',$export->topic_id)->update(([
                        'state' => 1,
                    ]));
                }
                if ($request->export_number) {
                    for ($i = 0; $i < count($request->export_number); $i++) {
                        $responsible_id[] = $request->responsible_id[$i];
                        $export_no[] = $request->export_number[$i];
                        $note[] = $request->note[$i];
                        $export = Responsible_export::create([
                            'tittle' => $request['namex'],
                            'topic_id' => $request['topic_id'],
                            'cat_name' => $request['cat_name'],
                            'date' => $request['date'],
                            'responsible_id' => $responsible_id[$i],
                            'export_number' => $export_no[$i],
                            'note' => $note[$i],
                            'state' => $request['state'],
                            'file' => implode('|', $upload),
                        ]);
                    }
                }
            } else {
                for ($i = 0; $i < count($request->export_number); $i++) {
                    $responsible_id[] = $request->responsible_id[$i];
                    $export_no[] = $request->export_number[$i];

                    $export = Responsible_export::create([
                        'tittle' => $request['namex'],
                        'topic_id' => $request['topic_id'],
                        'cat_name' => $request['cat_name'],
                        'date' => $request['date'],
                        'responsible_id' => $responsible_id[$i],
                        'export_number' => $export_no[$i],
                        'state' => $request['state'],
                        'file' => implode('|', $upload),
                    ]);
                }
            }
            return redirect()
                ->route('exports')
                ->with(['success' => 'تم حفظ الملف الصادر بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->route('exports')
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function edit(string $id)
    {
        $topics = Topic::select()
            ->with('name_side', 'rsename')
            ->where('state', 1)
            ->get();
        $side = Side::select()->get();
        $responsibles = Responsible::select()->get();
        $exports = Export::select()
            ->with('topic_export', 'sidename_export')
            ->find($id);
        if (!$exports) {
            return redirect()
                ->route('exports')
                ->with(['error' => 'هذه الملف غير موجوده']);
        }
        return view('export.edit', compact('exports', 'responsibles', 'side', 'topics'));
    }
    public function inside(string $id)
    {

        $inside = Response_Topic::select()->find($id);
        if (!$inside) {
            return redirect()
                ->route('exports')
                ->with(['error' => 'هذه الملف غير موجوده']);
        }
        return view('export.inside.insideEdit', compact( 'inside'));
    }

    public function inside_update(Request $request, $id)
    {
        $file = [];
        if ($files = $request->file('file')) {
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

        try {
            $inside = Response_Topic::find($id);
            if (!$inside) {
                return redirect()
                    ->route('admin.exports.edit', $id)
                    ->with(['error' => 'هذه الملف الصادر غير موجوده']);
            }
            if (!$request->has('active')) {
                $request->request->add(['active' => 0]);
            }
            $inside->update([
                'tittle' => $request['tittle'],
                'export_number' => $request['export_number'],
                'date' => $request['date'],
                'state' => $request['state'],
                'note' => $request['details'],
                'cat_name' => $request['cat_name'],
                'file' => implode('|', $upload),
            ]);
            return redirect()
                ->route('export.internal')
                ->with(['success' => 'تم تعديل الملف الصادر بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->route('exports')
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    public function update(Request $request, $id)
    {
        $upload_f = [];
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

        try {
            $exports = Export::find($id);
            if (!$exports) {
                return redirect()
                    ->route('admin.exports.edit', $id)
                    ->with(['error' => 'هذه الملف الصادر غير موجوده']);
            }
            if (!$request->has('active')) {
                $request->request->add(['active' => 0]);
            }
            $exports->update([
                'name' => $request['name'],
                'topic_id' => $request['topic_id'],
                'send_date' => $request['send_date'],
                'export_no' => $request['export_no'],
                'side_id' => $request['side_id'],
                'details' => $request['details'],
                'cat_name' => $request['cat_name'],
                'upload_f' => implode('|', $upload),
            ]);
            return redirect()
                ->route('exports')
                ->with(['success' => 'تم تعديل الملف الصادر بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->route('exports')
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function destroy($id)
    {
        try {
            $exports = Export::find($id);
            if (!$exports) {
                return redirect()
                    ->route('exports', $id)
                    ->with(['error' => 'هذه الملف الصادر غير موجوده']);
            }
            $exports->forcedelete();

            return redirect()
                ->route('exports')
                ->with(['success' => 'تم حذف الملف الصادر بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->route('exports')
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function delete($id)
    {
        try {
            $exports = Export::find($id);
            if (!$exports) {
                return redirect()
                    ->route('exports', $id)
                    ->with(['error' => 'هذه الملف الصادر غير موجوده']);
            }
            $exports->delete();

            return redirect()
                ->route('exports')
                ->with(['success' => 'تم نقل الي الارشيف بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->route('exports')
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function show($id)
    {
        $exports = Export::select()->find($id);
        if (!$exports) {
            return redirect()
                ->route('admin.export')
                ->with(['error' => 'هذه الملف غير موجوده']);
        }
        return view('admin.export.show', compact('exports'));
    }
}
