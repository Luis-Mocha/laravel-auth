<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// importo il modello
use App\Models\Admin\Project;


class ProjectGuestController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view( 'guest.projects.index', compact('projects') );
    }

    public function show($id)
    {
        // Ottengo i dati per il singolo "prodotto"
        $project = Project::findOrFail($id);

        return view('guest.projects.show', compact('project'));
    }
}
