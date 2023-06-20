<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// importo il modello
use App\Models\Admin\Project;

// importo la classe Rule per le eccezioni nell'unique
use Illuminate\Validation\Rule;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view( 'admin.projects.index', compact('projects') );
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // inserisco solo la view
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'title' => 'required|unique:projects',
                'link_project' => 'unique:projects|url'
            ],
            [
                'title.required'=> 'Il campo "titolo" è richiesto',
                'title.unique'=> 'Questo titolo è già utilizzato',
                'link_project.unique' => 'Questo link è già utilizzato',
                'link_project.url' => 'Questo campo deve contenere un link URL valido '
            ]
        );

        // funzione per salvare i nuovi dati nel database
        $form_data = $request ->all();
        // dd($request);

        //trasformo lo slug
        $slug = Project::generateSlug($request->title);


        $form_data['slug'] =$slug;

        //creo il nuovo progetto
        $newProject = new Project();
        
        $newProject->fill( $form_data );

        $newProject->save();

        //ritorno ad un'altra pagina
        return redirect()->route('admin.projects.index')->with('successCreate', 'Hai creato un nuovo progetto!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view( 'admin.projects.edit', compact ('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate(
            [
                'title' => [
                    'required',
                    Rule::unique('projects')->ignore($project->id),
                ],
                'link_project' => [
                    'url',
                    Rule::unique('projects')->ignore($project->id),
                ]
            ],
            [
                'title.required'=> 'Il campo "titolo" è richiesto',
                'title.unique'=> 'Questo titolo è già utilizzato in altri progetti',
                'link_project.unique' => 'Questo link è già utilizzato in altri progetti',
                'link_project.url' => 'Questo campo deve contenere un link URL valido '
            ]
        );


        // funzione per salvare i dati modificati nel database
        $form_data = $request->all();

        //trasformo lo slug
        $slug = Project::generateSlug($request->title);

        $form_data['slug'] =$slug;

        $project->update( $form_data );

        //ritorno ad un'altra pagina
        return redirect()->route('admin.projects.index')->with('successEdit', 'Hai modificato un progetto!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
