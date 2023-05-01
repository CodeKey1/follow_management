<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class UserController extends Controller
{
    //
    public function index(){

        $users = User::select()->get();
        return view('users.index', compact('users'));
    }
    public function create(){
        $role = Role::select()->get();
        return view('users.create',compact('role'));
    }
    protected function save (Request $request)
    {

        try {
            User::create([
                'cat_name' => $request['cat_name'],
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => $request['role'],

            ]);

            return redirect()->route('admin.users')->with(['success' => 'تم حفظ االمستخدم بنجاح']);

        } catch (\Exception $ex) {

            return redirect()->route('admin.users')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);

        }
    }
    public function delete($id)
    {

        try {
            $users = User::find($id);
            if (!$users) {
                return redirect()->route('admin.users', $id)->with(['error' => 'هذه المستخدم غير موجوده']);
            }
            $users->delete();

            return redirect()->route('admin.users')->with(['success' => 'تم حذف المستخدم بنجاح']);

        } catch (\Exception $ex) {

            return redirect()->route('admin.users')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    public function edit($id)
    {
        $users = User::select()->find($id);

        if (!$users) {
            return redirect()->route('admin.users')->with(['error' => 'هذه المستخدم غير موجوده']);
        }

        return view('admin.users.edit', compact('users'));

    }

    public function update(Request $request, $id)
    {
        try {
            $users = User::find($id);
            if (!$users) {
                return redirect()->route('admin.users.edit', $id)->with(['error' => 'هذه المستخدم غير موجوده']);
            }


            if (!$request->has('active'))
                $request->request->add(['active' => 0]);

            $users->update([
                'cat_name' => $request['cat_name'],
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => $request['role'],
            ]);

            return redirect()->route('admin.users')->with(['success' => 'تم تعديل المستخدم بنجاح']);

        } catch (\Exception $ex) {

            return redirect()->route('admin.users')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }


    }

}
