<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::select('id', 'name', 'is_active')->paginate(10);
        return view('admin.types.index', compact('types'));
    }

    public function addEdit(Request $request, $id = false)
    {
        if ($request->isMethod('POST')) {
            Type::updateOrCreate(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                    'is_active' => $request->is_active
                ]
            );

            return redirect()->to(route('types.index'));
        }

        $type = $id ? Type::find($id) : null;
        return view('admin.types.form', compact('type'));
    }
}
