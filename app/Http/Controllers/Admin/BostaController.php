<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governor_signatur;

class BostaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Gsignatur = Governor_signatur::select()->get();
        return view('posta.posta',compact('Gsignatur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posta.add_posta');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function vic_done()
    {
        //
        return view('posta.view_pdf');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $file = [];
        if ($files = $request->file('posta_file')) {
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

        $Gsignatur = Governor_signatur::find($id);
        if (!$Gsignatur) {
            return redirect()
                ->route('bosta.index', $id)
                ->with(['error' => 'هذه الموضوع غير موجوده']);
        }
        if (!$request->has('active')) {
            $request->request->add(['active' => 0]);
        }

        $Gsignatur->update($request->except('_token'));
        return redirect()
            ->route('bosta.index')
            ->with(['success' => 'تم تعديل الموضوع بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
