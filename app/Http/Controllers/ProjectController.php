<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('home', compact('projects'));
    }

    public function show($id)
    {
        $project = Project::find($id);
        return view('project.show', compact('project'));
    }

    public function admin()
    {
        $projects = Project::all();
        return view('admin', compact('projects'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'stack' => 'required',
                'image' => 'required|image',
                'link-project' => 'required'
            ]);

            $imagePath = $request->file('image')->move('public/uploads');
            // table->string('link-project');
            $nameProject = $request->name;
            Project::create([
                'name' => $request->name,
                'description' => $request->description,
                'stack' => $request->stack,
                'image' => basename($nameProject . $imagePath),
                'link' => $request->link,
            ]);

            return redirect()->route('admin');
        } catch (\Throwable $th) {
            return redirect()->back()->message($th);
        }
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        if ($project) {
            $project->delete();
        }
        return redirect()->route('admin');
    }
}
