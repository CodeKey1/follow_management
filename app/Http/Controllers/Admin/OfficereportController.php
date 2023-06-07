<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Response_Topic;
use App\Models\Export;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class OfficereportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $response = Response_Topic::select()->with('R_topic')->get();
        $data = Topic::select()->with('rsename', 't_export')->where('cat_name', Auth::user()->cat_name)->get();
        //$exports = Export::select()->with('topic_export')->where('cat_name', Auth::user()->cat_name)->get();
        return view('report.import', ['data' => $data],['response'=> $response]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
