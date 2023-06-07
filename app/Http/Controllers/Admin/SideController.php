<?php

namespace App\Http\Controllers\Admin;
use App\Models\Side;
use App\Models\Export;
use App\Models\Topic;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Side_brach;
use Illuminate\Http\Request;

class SideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $side = Side::select()->get();
        return view('sides.index',compact('side'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('sides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $imageName = time().'.'.$request->side_image->extension();
        try {

            $side = Side::create(([
                'side_name' => $request['side_name'],
                'side_image' => $imageName,
            ]));
            for ($i = 0; $i < count($request->name); $i++) {
                $name[] = $request->name[$i];

                Side_brach::create(([
                    'name' => $name[$i],
                    'side_image' => $request->side_image->move(('images'), $imageName),
                    'sides_id' => $side->id,
                ]));
            }
            return redirect()->route('side')->with(['success' => 'تم حفظ الجهة']);
        } catch (\Exception $ex) {
            return redirect()->route('side')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $topics = Topic::select()->where('side_id',$id)->get();
        $export = Export::select()->with('sidename_export')->where('side_id',$id)->get();
        $side = Side::select()->with('side_topic','side_export')->find($id);
        if (!$side) {
            return redirect()->route('side')->with(['error' => 'هذه الإدارة غير موجوده']);
        }
        $now = Carbon::today();
        $month = [];
        $X = [];
        $M = [];
        $N = [];
        for ($i = 0; $i < 12; $i++) {
            $Xport =  Export::where('side_id',$id)->whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->get();
            $Mport =  Topic::where('side_id',$id)->whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->get();
            $Nx =  Topic::where('side_id',$id)->whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->where('state','<>', 1)->get();
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

        return view('sides.profile', compact('side','export','topics','master'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $side = Side::select()->find($id);
        if (!$side) {
            return redirect()->route('side')->with(['error' => 'هذه الإدارة غير موجوده']);
        }
        return view('sides.edit', compact('side'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $side = Side::find($id);
            if (!$side) {
                return redirect()->route('side.profile', $id)->with(['error' => 'هذه الملف الصادر غير موجوده']);
            }


            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            $side -> update(([
                'side_name' => $request['side_name'],
            ]));
            for ($i = 0; $i < count($request->name); $i++) {
                $name[] = $request->name[$i];

                Side_brach::where('sides_id',$id)->update(([
                    'name' => $name[$i],
                    'sides_id' => $side->id,
                ]));
            }

            return redirect()->route('side.profile', $id)->with(['success' => 'تم تعديل الجهة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('side.profile', $id)->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
