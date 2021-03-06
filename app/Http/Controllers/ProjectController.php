<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Project::all();
        return view('projects.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'link' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $project = new Project;
        if ($request->active == NULL) {
            $request->merge([
                'active' => 0,
            ]);
        } else {
            $request->merge([
                'active' => 1,
            ]);
        }
        $fileName = time() . '_' . $request->image->getClientOriginalName();
        $request->file('image')->storeAs('public/images', $fileName);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->link = $request->link;
        $project->image = $fileName;
        $project->active = $request->active;
        $project->save();



        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'link' => 'required',
        ]);

        if ($request->active == NULL) {
            $request->merge([
                'active' => 0,
            ]);
        } else {
            $request->merge([
                'active' => 1,
            ]);
        }

        if ($request->file()) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $fileName);
            $project->image = $fileName;
        }

        $project->name = $request->name;
        $project->description = $request->description;
        $project->link = $request->link;
        $project->active = $request->active;
        $project->save();

        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully');
    }
}
