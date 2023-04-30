<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    public function getLogin(){

        return view('admin.login');
    }



    public  function Login (LoginRequest $request ): RedirectResponse
    {

        // make validation LoginRequest



        if (auth()->guard('admin')->attempt([

            'email'    => $request->input("email"),
            'password' => $request->input("password")
        ])) {
            // notify()->success('تم الدخول بنجاح  ');
            return redirect() -> route('admin.dashboard');
        }
        // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);




    }
}
