<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TopicsRequest;
use App\Models\Responsible;
use App\Models\Side;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    //
    public function index()
    {

        $topics_trash = Topic::onlyTrashed()->where('cat_name',Auth::user()->cat_name )->count();
        $topics = Topic::select()->with('rsename')->where('cat_name', Auth::user()->cat_name)->get();
        return view('topics.index', compact('topics','topics_trash'));
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

            Topic::create(([
                'import_id' => $request['import_id'],
                'name' => $request['name'],
                'responsibles_id' => $request['responsibles_id'],
                'side_id' => $request['side_id'],
                'file' => implode('|', $upload),
                'vic_sign' => $request['vic_sign'],
                'recived_date' => $request['recived_date'],
                'state' => $request['state'],
                'users_name' => $request['users_name'],
                'notes' => $request['notes'],
                'cat_name' => $request['cat_name'],

            ]));
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
        return view('topics.edit', compact('topics','responsibles','side'));
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

    public function show(string $id)
    {
        $topics = Topic::select()->find($id);

        if (!$topics) {
            return redirect()->route('topic.index')->with(['error' => 'هذه الموضوع غير موجوده']);
        }

        return view('topics.show', compact('topics'));
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
