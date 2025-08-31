<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Language;
use App\Models\Group;
use App\Models\Studentlanguage;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class StudentController extends Controller
{

   public function index(Request $request) {
    $search = $request->input('search');
    $languageId = $request->input('language_id');
    $groupId = $request->input('group_id');
    $sort = $request->input('sort', 'asc'); // default A → Z

    $students = Student::query()
        ->when($search || $languageId || $groupId, function ($query) use ($search, $languageId, $groupId) {
            $query->whereHas('studentlanguages', function ($q) use ($search, $languageId, $groupId) {
                // filter by student name or family_name
                if ($search) {
                    $q->whereHas('student', function ($studentQ) use ($search) {
                        $studentQ->where(function ($s) use ($search) {
                            $s->where('name', 'like', "%{$search}%")
                              ->orWhere('family_name', 'like', "%{$search}%");
                        });
                    });
                }

                // filter by language
                if ($languageId) {
                    $q->where('language_id', $languageId);
                }

                // filter by group
                if ($groupId) {
                    $q->where('group_id', $groupId);
                }
            });
        })
        ->orderBy('name', $sort)       // ✅ sort by student name
        ->orderBy('family_name', $sort) // optional, makes it more natural
        ->with('studentlanguages.language', 'studentlanguages.group')
        ->paginate(1);

    $languages = Language::all();
    $groups = Group::all();

    return view('students.index', compact('students', 'languages', 'groups', 'sort'));
}


    public function create() {
    $languages = Language::with('groups')->get();
    return view('students.create', compact('languages'));
    }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'family_name' => 'required|string|max:255',
        'birth_date' => 'nullable|date',
        'adress' => 'nullable|string|max:255',
        'phone_number' => 'nullable|string|max:20',
        'email' => 'nullable|email',
        'image' => 'nullable|string',
        'groups' => 'required|array',
        'groups.*' => 'exists:groups,id',
    ]);

    // Student::create with only student fields
    $student = Student::create(array_merge(
        Arr::except($validatedData, 'groups'),
        ['paid_amount' => 0, 'unpaid_amount' => 0]
    ));

    // Prepare bulk rows for studentlanguages
    $rows = collect($validatedData['groups'])->map(function ($groupId) use ($student) {
        $languageId = Group::findOrFail($groupId)->language_id;
        return [
            'student_id'  => $student->id,
            'group_id'    => $groupId,
            'language_id' => $languageId,
            'created_at'  => now(),
            'updated_at'  => now(),
        ];
    })->all();

    StudentLanguage::insert($rows);

    return redirect()->route('students.index')->with('success', 'Student created successfully!');
}



    public function edit(string $id)
    {
        $students = Student::findOrFail($id);
        return view("students.edit", compact('students'));
    }

    public function update(Request $request, string $id)
    {
        $students = Student::findOrFail($id);

        $validatedData = $request->validate( ['name' => 'required',
                                                    'family_name' => 'required',
                                                    'birth_date' => 'required',
                                                    'adress' => 'required',
                                                    'phone_number' => 'required',
                                                    'email' => 'required'
        ]);
                $students->update( $validatedData);
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
                $result = $student ->delete();
        if($result){
            return redirect()->route('students.index')->with('success', "Student was deleted with success");
        }
        else {
            return redirect()->route('students.index')->with('error', "failed to delete Student");
        }
        }
    }

