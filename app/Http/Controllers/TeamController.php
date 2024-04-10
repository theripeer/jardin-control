<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $term = $request->query('term', '');
        $teams = Team::select('id', 'name')->search($term)->paginate(10);
        if (!is_null($term))
            $teams->appends(['term' => $term]);
        return view('admin.teams.index', compact('teams', 'term'));
    }

    public function addEdit(Request $request, $id = false)
    {
        if ($request->isMethod('POST')) {
            $team = Team::updateOrCreate(
                ['id' => $request->id],
                [
                    'name' => $request->name
                ]
            );

            $users = [];
            foreach ($request->users as $key => $value) {
                $users[] = $value;
            }

            $team->users()->sync($users);

            return redirect()->to(route('teams.index'));
        }
        $users = User::all();//User::doesntHave('teams')->get();
        $team = $id ? Team::find($id) : null;
        $teamusers = $id ? $team->users->map(function($u) { return $u->id; })->toArray() : [];

        return view('admin.teams.form', compact('team', 'users', 'teamusers'));
    }

    public function delete($id)
    {
        $task = Task::whereTeamId($id)->get();

        if (count($task) > 0) {
            return response()->json(["message" => "No se puede eliminar esta cuadrilla ya tiene asignada tareas, elimine o cambie de cuadrilla las tareas."], 422);
        }

        $team_users = \DB::table('team_users')->whereTeamId($id)->delete();
        $task = Task::whereTeamId($id)->delete();
        $team = Team::find($id)->delete();
        return response()->json([""], 200);
    }
}
