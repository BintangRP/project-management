<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function landingPage()
    {
        $projects = Project::paginate(5)->all();
        return view('home', compact('projects'));
    }

    public function show($id)
    {
        $project = Project::find($id);
        return view('project', compact('project'));
    }

    public function projects()
    {
        $projects = Project::all();
        return view('projects', compact('projects'));
    }

    public function admin()
    {
        $projects = Project::all();
        return view('admin', compact('projects'));
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        try {
            // validasi request
            try {
                $request->validate([
                    'name' => 'required',
                    'description' => 'required',
                    'stack' => 'required',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'link_project' => 'required'
                ]);

                $project = new Project();
                $project->name = $request->name;
                $project->description = $request->description;
                $project->stack = $request->stack;
                $project->link_project = $request->link_project;

                // fungsi untuk upload gambar
                if ($request->has('image')) {
                    $tujuan_upload = public_path('uploads');
                    $file = $request->file('image');
                    $nameProject = preg_replace('/\s+/', '_', $request->id);
                    $namaFile = Carbon::now()->format('Ymdhis') . '_' . $nameProject;
                    $file->move($tujuan_upload, $namaFile);
                    $project->image = 'uploads/' . $namaFile;
                }

                $project->save();
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }

            return redirect()->route('admin')->with('success', 'Berhasil!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $project = Project::find($id);
        if (!$project) return redirect()->back()->with('error', 'Project not found');

        return view('project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        try {
            // validasi request
            // dd($request);
            try {
                $this->validate($request, [
                    'name' => 'required',
                    'description' => 'required',
                    'stack' => 'required',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'link_project' => 'required'
                ]);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }

            // Create data projects ke database
            $project = Project::find($id);
            if (!$project) return redirect()->back()->with('error', 'Project tidak ditemukan');

            $project->name = $request->name;
            $project->description = $request->description;
            $project->stack = $request->stack;
            $project->link_project = $request->link_project;

            // fungsi untuk upload gambar
            try {

                if ($request->has('image')) {

                    $tujuan_upload = public_path('uploads');
                    $file = $request->file('image');

                    $nameProject = preg_replace('/\s+/', '_', $request->id);

                    $namaFile = Carbon::now()->format('Ymdhis') . '_' . $nameProject;

                    $file->move($tujuan_upload, $namaFile);
                    // dd($file->move($tujuan_upload, $namaFile));
                    $project->image = 'uploads/' . $namaFile;
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }

            $project->save();

            return redirect()->route('admin')->with('success', 'Berhasil!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $project = Project::find($id);
            if ($project) {
                File::delete($project->image);
                $project->delete();
                return redirect()->back()->with('success', 'Project berhasil dihapus.');
            }

            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
