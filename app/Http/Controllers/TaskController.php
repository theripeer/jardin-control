<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Task;
use App\Models\Team;
use App\Models\Type;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::select('id', 'name', 'is_active')->paginate(10);
        return view('admin.tasks.index', compact('tasks'));
    }

    public function addEdit(Request $request, $id = false)
    {
        if ($request->isMethod('POST')) {
            Task::updateOrCreate(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                    'is_active' => $request->is_active
                ]
            );

            return redirect()->to(route('tasks.index'));
        }

        $task = $id ? Task::find($id) : null;
        
        $teams = Team::all();
        $types = Type::all();
        $services = Service::all();

        $states = config('custom.state');
        $sanitary = config('custom.sanitary');
        $states_payment = config('custom.states_payment');

        return view('admin.tasks.form', compact('task', 'teams', 'types', 'services', 'states', 'sanitary', 'states_payment'));
    }
}
