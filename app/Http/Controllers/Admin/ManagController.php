<?php

namespace App\Http\Controllers\Admin;
use App\Models\Responsible;
use App\Http\Controllers\Controller;
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

            return redirect()->route('manage')->with(['success' => 'تم تعديل الإدارة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('manage')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
