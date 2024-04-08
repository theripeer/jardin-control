<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'username')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function addEdit(Request $request, $id = false)
    {
        if ($request->isMethod('POST')) {
            User::updateOrCreate(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                    'is_active' => $request->is_active
                ]
            );

            return redirect()->to(route('users.index'));
        }

        $user = $id ? User::find($id) : null;
        return view('admin.users.form', compact('user'));
    }
}
