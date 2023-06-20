<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TopicsRequest;
use App\Models\Responsible;
use App\Models\Side;
use App\Models\Export;
use App\Models\R_export;
use App\Models\Response_Topic;
use App\Models\Topic;
use App\Models\Responsible_export;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    //
    public function index()
    {
        $now = Carbon::today();
        $response = Response_Topic::select()->with('R_topic')->get();
        $topics_trash = Topic::select()->where('state', '<>', 1)->where('cat_name', Auth::user()->cat_name)->count();
        $topics = Topic::select()->with('rsename', 't_export')->where('cat_name', Auth::user()->cat_name)->whereYear('recived_date',$now->year)->get();
        $exports = Export::select()->with('topic_export')->where('cat_name', Auth::user()->cat_name)->get();
        $inside_import = R_export::select()->get();
        return view('topics.index', compact('topics', 'topics_trash', 'exports', 'response','inside_import'));
    }

    public function T_archive()
    {
        $now = Carbon::today();
        $topics = Topic::select()
            ->where('cat_name', Auth::user()->cat_name)
            ->whereYear('recived_date','<',$now->year)
            ->get();
        return view('topics.archive', compact('topics'));
    }

    public function create()
    {
        $inside_export = Responsible_export::select()->get();
        $side = Side::select()->get();
        $responsibles = Responsible::select()->get();
        return view('topics.create', compact('responsibles','inside_export', 'side'));
    }
    public function reply()
    {
        $inside_export = Responsible_export::select()->get();
        $restopic = Response_Topic::select('state')->get();
        $exports = Export::select()->where('topic_id', null)->get();
        $side = Side::select()->get();
        $responsibles = Responsible::select()->get();
        return view('topics.reply', compact('responsibles', 'side', 'exports', 'inside_export','restopic'));
    }

    public function reply_save(Request $request)
    {
        $file = [];
        if ($files = $request->file('reply_file')) {
            foreach ($files as $file) {
                $ext = strtolower($file->getClientOriginalName());
                $file_name = time() . '.' . $ext;
                $path = 'attatch_office/import_follow';
                $file->move($path, $file_name);
                $upload[] = $file_name;
            }
        } else {
            $upload[] = '';
        }
        try {
            $rexport = R_export::create([
            'responsible_export_id' => $request['responsible_export_id'],
            'reply_id' => $request['reply_id'],
            'responsibles_id' => $request['responsibles_id'],
            'topic' => $request['topic'],
            'date' => $request['date'],
            'confirm_vic' => $request['confirm_vic'],
            'reply_file' => implode('|', $upload),
            'cat_name' => $request['cat_name'],
        ]);
        Response_Topic::where('topic_id', $rexport->topic_id)
            ->where('responsible_id', $request['responsibles_id'])
            ->update([
                'state' => 1,
            ]);
        return redirect()
            ->route('topic.index')
            ->with(['success' => 'تم حفظ الموضوع بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('topic.index')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
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
                $path = 'attatch_office/import_follow';
                $file->move($path, $file_name);
                $upload[] = $file_name;
            }
        } else {
            $upload[] = '';
        }
        // try {
            $topics = Topic::create([
                'import_id' => $request['import_id']. '/'. $request['side_id'] . '/'. $now->year,
                'office_id' => $request['office_id'],
                'name' => $request['name'],
                'side_id' => $request['side_id'],
                'file' => implode('|', $upload),
                'vic_sign' => $request['vic_sign'],
                'import_date' => $request['import_date'],
                'recived_date' => $request['recived_date'],
                'state' => $request['state'],
                'users_name' => $request['users_name'],
                'notes' => $request['notes'],
                'cat_name' => $request['cat_name'],
            ]);
            for ($i = 0; $i < count($request->responsibles_id); $i++) {
                $responsibles_id[] = $request->responsibles_id[$i];

                Response_Topic::create([
                    'responsible_id' => $responsibles_id[$i],
                    'topic_id' => $topics->id,
                    'state' => 0,
                ]);
            }
            return redirect()
                ->route('topic.index')
                ->with(['success' => 'تم حفظ الموضوع بنجاح']);
        // } catch (\Exception $ex) {
        //     return redirect()
        //         ->route('topic.index')
        //         ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        // }
    }

    public function edit($id)
    {
        $side = Side::select()->get();
        $responsibles = Responsible::select()->get();
        $topics = Topic::select()
            ->with('rsename')
            ->find($id);
        if (!$topics) {
            return redirect()
                ->route('topic.index')
                ->with(['error' => 'هذه الموضوع غير موجوده']);
        }
        return view('topics.edit', compact('topics', 'responsibles', 'side'));
    }

    public function update(Request $request, $id)
    {
        $file = [];
        if ($files = $request->file('file')) {
            foreach ($files as $file) {
                $ext = strtolower($file->getClientOriginalName());
                $file_name = time() . '.' . $ext;
                $path = 'attatch_office/import_follow';
                $file->move($path, $file_name);
                $upload[] = $file_name;
            }
        } else {
            $upload[] = '';
        }

        $topics = Topic::find($id);
        if (!$topics) {
            return redirect()
                ->route('topic.index', $id)
                ->with(['error' => 'هذه الموضوع غير موجوده']);
        }
        if (!$request->has('active')) {
            $request->request->add(['active' => 0]);
        }

        $topics->update($request->except('_token'));
        return redirect()
            ->route('topic.index')
            ->with(['success' => 'تم تعديل الموضوع بنجاح']);
    }

    public function destroy(string $id)
    {
        try {
            $topics = Topic::find($id);
            if (!$topics) {
                return redirect()
                    ->route('topic.index', $id)
                    ->with(['error' => 'هذه الموضوع غير موجوده']);
            }
            $topics->forcedelete();

            return redirect()
                ->route('topic.index')
                ->with(['success' => 'تم حذف الموضوع بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->route('topic.index')
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function archive(string $id)
    {
        try {
            $topics = Topic::find($id);
            if (!$topics) {
                return redirect()
                    ->route('topic.index', $id)
                    ->with(['error' => 'هذه الموضوع غير موجوده']);
            }
            $topics->delete();

            return redirect()
                ->route('topic.index')
                ->with(['success' => 'تم نقل الي الارشيف بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->route('topic.index')
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function show(string $import_id)
    {
        $now = Carbon::today();
        $topics = Topic::select()
            ->with('t_export', 'name_side')
            ->where('id', $import_id)
            ->find($import_id);
        $side = Side::select()->get();
        $exports = Export::select()
            ->where('topic_id', $import_id)
            ->get();
        $response = Response_Topic::select()
            ->with('R_topic')
            ->get();

        if (!$topics) {
            return redirect()
                ->route('topic.index')
                ->with(['error' => 'هذه الموضوع غير موجوده']);
        }

        return view('topics.read', compact('topics', 'response', 'side', 'exports', 'now'));
    }

    public function response(Request $request)
    {
        try {
            Responsible::create([
                'name' => $request['name'],
            ]);
            return redirect()
                ->route('adtopics.create')
                ->with(['success' => 'تم حفظ المسؤل بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->route('topics.create')
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    public function ajax_search(Request $request)
    {
        if ($request->ajax()) {

            $search_by_text = $request->search_by_text;
            $searchbyradio = $request->searchbyradio;
            $order_date_form = $request->order_date_form;
            $order_date_to = $request->order_date_to;

            $searchByactiveStatus = $request->searchByactiveStatus;


            if ($search_by_text != '') {
                if ($searchbyradio == 'import_id') {
                    $field1 = "import_id";
                    $operator1 = "=";
                    $value1 = $search_by_text;
                } elseif ($searchbyradio == 'name') {
                    $field1 = "name";
                    $operator1 = "like";
                    $value1 = "%{$search_by_text}%";
                } else {
                    $field1 = "notes";
                    $operator1 = "like";
                    $value1 = "%{$search_by_text}%";
                }
            } else {
                //true
                $field1 = "id";
                $operator1 = ">";
                $value1 = 0;
            }

            if ($order_date_form == '') {
                //دائما  true
                $field3 = "id";
                $operator3 = ">";
                $value3 = 0;
            } else {
                $field3 = "recived_date";
                $operator3 = ">=";
                $value3 = $order_date_form;
            }
            if ($order_date_to == '') {
                //دائما  true
                $field4 = "id";
                $operator4 = ">";
                $value4 = 0;
            } else {
                $field4 = "recived_date";
                $operator4 = "<=";
                $value4 = $order_date_to;
            }

            // if ($searchByactiveStatus == 1) {
            //     $field5 = "state";
            //     $operator5 = "!=";
            //     $value5 = $searchByactiveStatus;
            // } elseif ($searchByactiveStatus == 2) {

            //     $field5 = "state";
            //     $operator5 = "=";
            //     $value5 = $searchByactiveStatus;
            // } else {
            //     $field5 = "state";
            //     $operator5 = "=";
            //     $value5 = 0;
            // }
            if ($searchByactiveStatus == "all") {
                $field5 = "id";
                $operator5 = ">";
                $value5 = 0;
            } else {
                if ($searchByactiveStatus == 1) {
                    $field5 = "state";
                    $operator5 = "=";
                    $value5 = $searchByactiveStatus;
                } elseif ($searchByactiveStatus == 2) {
                    $field5 = "state";
                    $operator5 = "=";
                    $value5 = $searchByactiveStatus;
                } else {
                    $field5 = "state";
                    $operator5 = "=";
                    $value5 = 0;
                }
            }

            $data = Topic::where($field1, $operator1, $value1)
            ->where($field3, $operator3, $value3)
            ->where($field4, $operator4, $value4)
            ->where($field5, $operator5, $value5)
            ->orderBy('id', 'DESC')->get();

            return view('report.ajax_search', ['data' => $data]);
        }
    }
}
