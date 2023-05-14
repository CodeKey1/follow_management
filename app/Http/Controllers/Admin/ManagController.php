<?php

namespace App\Http\Controllers\Admin;
use App\Models\Responsible;
use App\Http\Controllers\Controller;
use App\Models\Export;
use App\Models\Side;
use App\Models\Ts_Export;
use App\Models\Response_Topic;
use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ManagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $responsibles = Responsible::select()->get();
        return view('management.index',compact('responsibles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {

            Responsible::create(([ 'name' => $request['name']]));
            return redirect()->route('manage')->with(['success' => 'تم حفظ الإدارة']);
        } catch (\Exception $ex) {
            return redirect()->route('manage')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $topics = Topic::select()->with('rsename')->get();
        $export = Export::select()->get();
        $responsible = Responsible::select()->with('Responetopic','Responexport')->find($id);
        $manage_export = Response_Topic::select()->where('responsible_id',$id)->get();
        if (!$responsible) {
            return redirect()->route('manage')->with(['error' => 'هذه الإدارة غير موجوده']);
        }
        $now = Carbon::today();
        $month = [];
        $X = [];
        $M = [];
        $N = [];
        for ($i = 0; $i < 12; $i++) {
            $Xport =  Ts_Export::with('R_export')->where('responsible_id',$id)->whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->get();
            $Mport =  Response_Topic::with('R_topic')->where('responsible_id',$id)->whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->get();
            $Nx =  Response_Topic::with('R_topic')->where('responsible_id',$id)->whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->where('state','<>', 1)->get();
            array_push($month, $now->format('M') . ' ' . $now->format('Y'));
            array_push($X, $Xport->count());
            array_push($M, $Mport->count());
            array_push($N, $Nx->count());
            $now =  $now->subMonth();
        }

        $master['X'] = json_encode($X);
        $master['month'] = json_encode($month);
        $master['M'] = json_encode($M);
        $master['N'] = json_encode($N);

        return view('management.profile',compact('responsible','export','topics','id','master','manage_export'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $responsible = Responsible::select()->find($id);
        if (!$responsible) {
            return redirect()->route('manage')->with(['error' => 'هذه الإدارة غير موجوده']);
        }
        return view('management.edit', compact('responsible'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $responsible = Responsible::find($id);
            if (!$responsible) {
                return redirect()->route('manage.edit', $id)->with(['error' => 'هذه الملف الصادر غير موجوده']);
            }


            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            $responsible -> update(([
                'name' => $request['name'],
            ]));

            return redirect()->route('manage.profile', $id)->with(['success' => 'تم تعديل الإدارة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('manage.profile', $id)->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
