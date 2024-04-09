<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validation;
class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email' ,'username', 'rol')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function addEdit(Request $request, $id = false)
    {
        if ($request->isMethod('POST')) {

            /* $rules = [
                'name' => 'required|min:3|max:50',
                'email' => 'email|unique:users',
                'username' => 'required|unique:users',
            ];

            if($request->password != ''){
                $rules[]= [
                    'password' => 'confirmed|min:6',
                ];
            }

            $this->validate($request, $rules); */


            User::updateOrCreate(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'username' => $request->username,
                    'password' => $request->password,
                    'is_active' => $request->is_active ?? true,
                    'rol' => $request->rol,
                ]
            );

            return redirect()->to(route('users.index'));
        }

        $user = $id ? User::find($id) : null;
        return view('admin.users.form', compact('user'));
    }
}
