<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Task;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::select('id', 'name', 'price')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function addEdit(Request $request, $id = false)
    {
        if ($request->isMethod('POST')) {
            Service::updateOrCreate(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                    'price' => $request->price
                ]
            );

            return redirect()->to(route('services.index'));
        }

        $service = $id ? Service::find($id) : null;
        return view('admin.services.form', compact('service'));
    }

    public function delete($id)
    {
        $task = Task::whereServiceId($id)->get();

        if (count($task) > 0) {
            return response()->json(["message" => "No se puede eliminar este servicio ya tiene asignado tareas, elimine o cambie las tareas que contengan este servicio."], 422);
        }
        $task = Service::find($id)->delete();
        return response()->json([""], 200);
    }
}
