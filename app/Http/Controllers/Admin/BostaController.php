<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bosta;
use Illuminate\Http\Request;
use App\Models\Side;
use Carbon\Carbon;
use App\Models\Responsible;
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
        return view('posta.posta', compact('Gsignatur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $responsibles = Responsible::select()->get();
        $side = Side::select()->get();
        return view('posta.add_posta',compact('responsibles','side'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $now = Carbon::today();
        $imageName = time().'.'.$request->posta_file->extension();
        try {
            $signatur = Governor_signatur::create([
                'posta_num' => request('posta_num'),
                'posta_office_num' => request('posta_office_num'),
                'posta_date' => request('posta_date'),
                'bosta_recive' => request('bosta_recive'),
                'side_name' => request('side_name'),
                'posta_state' => 'لم يتم' ,
                'posta_about' => request('posta_about'),
                'posta_file' => $request->posta_file->move(('vice'), $imageName),
            ]);
            for ($i = 0; $i < count($request->side_mean); $i++) {
                $side_mean[] = $request->side_mean[$i];
                Bosta::create([
                    'side_mean' => $side_mean[$i],
                    'governor_signature_id' => $signatur->id,
                ]);
            }
            return redirect()->route('bosta.index') ->with(['success' => 'تم حفظ الموضوع بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('bosta.index')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function vic_done(Request $request,string $id)
    {
        //
        $Gsignatur = Governor_signatur::select()->find($id);
        $Gsign = Governor_signatur::select()->where('id',$id)->get();
        $side = Bosta::select()->where('governor_signature_id',$id)->get();
        return view('posta.view_pdf', compact('Gsignatur','Gsign','side'));
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
