<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Language;
use App\Models\Group;
use App\Models\Studentlanguage;
use Illuminate\Http\Request;

class StudentController extends Controller
{

   public function index(Request $request) {
        $students=Student::all();
    return view('students.index', compact('students'));
}


    public function create() {
    $languages = Language::with('groups')->get();
    return view('students.create', compact('languages'));
    }

public function store(Request $request)
{
    // 1. Validate student data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'family_name' => 'required|string|max:255',
        'birth_date' => 'nullable|date',
        'adress' => 'nullable|string|max:255',
        'phone_number' => 'nullable|integer',
        'email' => 'nullable|email',
        'image' => 'nullable|string', // or handle file upload
        'groups' => 'required|array', // the selected group_ids
        'groups.*' => 'exists:groups,id',
    ]);

    // 2. Create student
    $student = Student::create([
        'name' => $validated['name'],
        'family_name' => $validated['family_name'],
        'birth_date' => $validated['birth_date'] ?? null,
        'adress' => $validated['adress'] ?? null,
        'phone_number' => $validated['phone_number'] ?? null,
        'email' => $validated['email'] ?? null,
        'image' => $validated['image'] ?? null,
        'paid_amount' => 0,
        'unpaid_amount' => 0,
    ]);

    // 3. Insert into studentlanguages
    foreach ($validated['groups'] as $groupId) {
        $group = Group::find($groupId);

        StudentLanguage::create([
            'student_id' => $student->id,
            'group_id' => $groupId,
            'language_id' => $group->language_id,
        ]);
    }

    return redirect()->route('students.index')->with('success', 'Student created successfully!');
}


    public function edit(string $id)
    {
        return view("students.edit");
    }

    public function update(Request $request, string $id)
    {
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {

            return redirect()->route('students.index')->with('error', "couldn't delete the student");
        }
    }

