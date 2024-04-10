<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validation;
class UserController extends Controller
{
    public function index(Request $request)
    {
        $term = $request->query('term', '');
        $users = User::select('id', 'name', 'email' ,'username', 'rol')->search($term)->paginate(10);
        
        if (!is_null($term))
            $users->appends(['term' => $term]);

        return view('admin.users.index', compact('users', 'term'));
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

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'rol' => $request->rol,
                'is_active' => $request->is_active ?? true,
            ];

            if ($request->password != '') {
                $data['password'] =  Hash::make($request->password);
            }

            User::updateOrCreate(
                ['id' => $request->id],
                $data
            );

            return redirect()->to(route('users.index'));
        }

        $user = $id ? User::find($id) : null;
        return view('admin.users.form', compact('user'));
    }

    public function delete($id)
    {
        $user_team = \DB::table('team_users')->whereUserId($id)->delete();
        $user = User::find($id)->delete();
        return response()->json([""], 200);
    }
}
