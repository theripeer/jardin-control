<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Task;
use App\Models\Team;
use App\Models\Type;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $term = $request->query('term', '');

        $tasks = Task::orderBy('id', 'DESC')
            ->search($term)
            ->byUser()
            ->paginate(10);

        if (!is_null($term))
            $tasks->appends(['term' => $term]);

        return view('admin.tasks.index', compact('tasks', 'term'));
    }

    public function addEdit(Request $request, $id = false)
    {
        if ($request->isMethod('POST')) {

            if($request->id) {
                $task = Task::updateOrCreate(
                    ['id' => $request->id],
                    $request->except(['id', 'img_1', 'img_2', 'img_3', 'img_4', 'folio'])
                );
            } else {
                $task = Task::updateOrCreate(
                    ['id' => $request->id],
                    $request->except(['id', 'img_1', 'img_2', 'img_3', 'img_4'])
                );
            }
            
            if($request->file('img_1')) {
                $imageName1 = '1-'.time() . '.' . $request->img_1->extension();
                $request->img_1->move(public_path("images/task/{$task->folio}"), $imageName1);
                $task->update(['img_1' => $imageName1]);
            }

            if ($request->file('img_2')) {
                $imageName2 = '2-' . time() . '.' . $request->img_2->extension();
                $request->img_2->move(public_path("images/task/{$task->folio}"), $imageName2);
                $task->update(['img_2' => $imageName2]);
            }

            if ($request->file('img_3')) {
                $imageName3 = '3-' . time() . '.' . $request->img_3->extension();
                $request->img_3->move(public_path("images/task/{$task->folio}"), $imageName3);
                $task->update(['img_3' => $imageName3]);
            }

            if ($request->file('img_4')) {
                $imageName4 = '4-' . time() . '.' . $request->img_4->extension();
                $request->img_4->move(public_path("images/task/{$task->folio}"), $imageName4);
                $task->update(['img_4' => $imageName4]);
            }

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

    public function delete($id)
    {
        $task = Task::find($id);
        \File::deleteDirectory(public_path("/images/task/{$task->folio}"));
        $task->delete();

        return response()->json([""], 200);
    }
}
