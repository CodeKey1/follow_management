<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TopicsRequest;
use App\Models\Responsible;
use App\Models\Side;
use App\Models\Export;
use App\Models\Response_Topic;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    //
    public function index()
    {
        $response = Response_Topic::select()->with('R_topic')->get();
        $topics_trash = Topic::select()->where('state', '<>', 1)->where('cat_name', Auth::user()->cat_name)->count();
        $topics = Topic::select()->with('rsename','t_export')->where('cat_name', Auth::user()->cat_name)->get();
        $exports = Export::select()->with('topic_export')->where('cat_name', Auth::user()->cat_name)->get();
        return view('topics.index', compact('topics', 'topics_trash', 'exports','response'));
    }

    public function T_archive()
    {

        $topics = Topic::onlyTrashed()->where('cat_name', Auth::user()->cat_name)->get();
        return view('topics.archive', compact('topics'));
    }

    public function create()
    {
        $side = Side::select()->get();
        $responsibles = Responsible::select()->get();
        return view('topics.create', compact('responsibles', 'side'));
    }


    public function save(Request $request)
    {
        $file = array();
        if ($files = $request->file('file')) {
            foreach ($files as $file) {
                $ext = strtolower($file->getClientOriginalName());
                $file_name = time() . '.' . $ext;
                $path = 'attatch_office/import_follow';
                $file->move($path, $file_name);
                $upload[] = $file_name;
            }
        } else {
            $upload[] = "";
        }
        try {
            $topics = Topic::create(([
                'import_id' => $request['import_id'],
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

            ]));
            for ($i = 0; $i < count($request->responsibles_id); $i++) {
                $responsibles_id[] = $request->responsibles_id[$i];

                Response_Topic::create(([
                    'responsible_id' => $responsibles_id[$i],
                    'topic_id' => $topics->id,
                    'state' => 0,
                ]));
            }
            return redirect()->route('topic.index')->with(['success' => 'تم حفظ الموضوع بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('topic.index')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }


    public function edit($id)
    {
        $side = Side::select()->get();
        $responsibles = Responsible::select()->get();
        $topics = Topic::select()->with('rsename')->find($id);
        if (!$topics) {
            return redirect()->route('topic.index')->with(['error' => 'هذه الموضوع غير موجوده']);
        }
        return view('topics.edit', compact('topics', 'responsibles', 'side'));
    }

    public function update(Request $request, $id)
    {
        $file = array();
        if ($files = $request->file('file')) {
            foreach ($files as $file) {
                $ext = strtolower($file->getClientOriginalName());
                $file_name = time() . '.' . $ext;
                $path = 'attatch_office/import_follow';
                $file->move($path, $file_name);
                $upload[] = $file_name;
            }
        } else {
            $upload[] = "";
        }

        $topics = Topic::find($id);
        if (!$topics) {
            return redirect()->route('topic.index', $id)->with(['error' => 'هذه الموضوع غير موجوده']);
        }
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);

        $topics->update($request->except('_token'));
        return redirect()->route('topic.index')->with(['success' => 'تم تعديل الموضوع بنجاح']);
    }

    public function destroy(string $id)
    {

        try {
            $topics = Topic::find($id);
            if (!$topics) {
                return redirect()->route('topic.index', $id)->with(['error' => 'هذه الموضوع غير موجوده']);
            }
            $topics->forcedelete();

            return redirect()->route('topic.index')->with(['success' => 'تم حذف الموضوع بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('topic.index')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function archive(string $id)
    {

        try {
            $topics = Topic::find($id);
            if (!$topics) {
                return redirect()->route('topic.index', $id)->with(['error' => 'هذه الموضوع غير موجوده']);
            }
            $topics->delete();

            return redirect()->route('topic.index')->with(['success' => 'تم نقل الي الارشيف بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('topic.index')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function show(string $import_id)
    {
        $side = Side::select()->get();
        $exports = Export::select()->where('topic_id',$import_id)->get();
        $response = Response_Topic::select()->with('R_topic')->get();
        $topics = Topic::select()->find($import_id);

        if (!$topics) {
            return redirect()->route('topic.index')->with(['error' => 'هذه الموضوع غير موجوده']);
        }

        return view('topics.read', compact('topics','response', 'side','exports'));
    }

    public function response(Request $request)
    {

        try {

            Responsible::create(([
                'name' => $request['name'],

            ]));
            return redirect()->route('adtopics.create')->with(['success' => 'تم حفظ المسؤل بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('topics.create')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
}
