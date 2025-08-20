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
        //validation
        $validatedData = $request->validate( ['name' => 'required',
                                                    'family_name' => 'required',
                                                    'language_id' => 'required',
        ]);
        //creation
        Teacher::create( $validatedData);
        return redirect()->route('teachers.index')->with('success',"teacher has been created");
}


    public function edit(string $id)
    {
        return view("teachers.edit");
    }

    public function update(Request $request, string $id)
    {
        return redirect()->route('teachers.index');
    }

    public function destroy(Teacher $teacher)
    {

            return redirect()->route('teachers.index')->with('error', "couldn't delete the Teacher");
        }
    }

