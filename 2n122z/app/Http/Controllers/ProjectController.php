<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    $query = $request->input('search');

    if ($query) {

        $projects = Project::where('name', 'like', "%$query%")
                             ->paginate(10);
    } else {

        $projects = Project::paginate(10);
    }

    return view('projects.index', compact('projects', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('projects.create',['customers'=>$customers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'customer_id' => 'required|exists:customers,id',
        'deadline' => 'required|date|after_or_equal:today',
        'date_start' => 'required|date|before_or_equal:deadline',
        'date_end' => 'nullable|date|after_or_equal:start_date',
        'status' => 'required|string|max:255',
        'priority' => 'required|string|max:255',
        'budget' => 'nullable|numeric|min:0',
        'description' => 'nullable|string|max:5000',
    ]);

    Project::create($validatedData);

    return redirect()->route('projects.index')->with('success', 'Projekt doany pomyślnie');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.view',[
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
