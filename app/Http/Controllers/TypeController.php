<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        $term = $request->query('term', '');
        $types = Type::select('id', 'name', 'is_active')->search($term)->paginate(10);

        if (!is_null($term))
            $types->appends(['term' => $term]);

        return view('admin.types.index', compact('types', 'term'));
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

    public function delete($id)
    {
        $task = Task::whereTypeId($id)->get();

        if (count($task) > 0) {
            return response()->json(["message" => "No se puede eliminar esta especie ya tiene asignado tareas, elimine o cambie las tareas que contengan esta especie."], 422);
        }
        $task = Type::find($id)->delete();
        return response()->json([""], 200);
    }
}
