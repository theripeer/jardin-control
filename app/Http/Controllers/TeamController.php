<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::select('id', 'name')->paginate(10);
        return view('admin.teams.index', compact('teams'));
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
        $users = User::all();
        $team = $id ? Team::find($id) : null;
        $teamusers = $id ? $team->users->map(function($u) { return $u->id; })->toArray() : [];

        return view('admin.teams.form', compact('team', 'users', 'teamusers'));
    }
}
