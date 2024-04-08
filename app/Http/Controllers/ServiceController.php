<?php

namespace App\Http\Controllers;

use App\Models\Service;
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
}
