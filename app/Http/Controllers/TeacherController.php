<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\Language;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

   public function index(Request $request) {
        $teachers=Teacher::all();
    return view('teachers.index', compact('teachers'));
}


    public function create() {
        $languages=Language::all();
    return view('teachers.create', compact('languages'));
    }

    public function store(Request $request)
{

        $validatedData = $request->validate( ['name' => 'required',
                                                    'family_name' => 'required',
                                                    'language_id' => 'required',
        ]);

        Teacher::create( $validatedData);
        return redirect()->route('teachers.index')->with('success',"teacher has been created");
}


    public function edit(string $id)
    {
    $teachers=Teacher::findOrFail($id);
    $languages=Language::all();
        return view("teachers.edit", compact('teachers', 'languages'));
    }

    public function update(Request $request, string $id)
    {
        $teachers = Teacher::findOrFail($id);

        $validatedData = $request->validate( ['name' => 'required',
                                                    'family_name' => 'required',
                                                    'language_id' => 'required',
        ]);
                $teachers->update( $validatedData);
        return redirect()->route('teachers.index');
    }

    public function destroy(Teacher $teacher)
    {
                $result = $teacher ->delete();
        if($result){
            return redirect()->route('teachers.index')->with('success', "teacher was deleted with success");
        }
        else {
            return redirect()->route('teachers.index')->with('error', "failed to delete teacher");
        }
        }
    }

