<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Language;
use App\Models\Studentlanguage;
use App\Models\Group;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class StudentlanguageController extends Controller
{

   public function index(Request $request) {
    $search = $request->input('search');
    $languageId = $request->input('language_id');
    $groupId = $request->input('group_id');
    $sort = $request->input('sort', 'asc');
    $studentlanguages = StudentLanguage::with(['student', 'language', 'group'])
        ->when($search, function ($query, $search) {
            $query->whereHas('student', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('family_name', 'like', "%{$search}%");
            });
        })
        ->when($languageId, function ($query, $languageId) {
            $query->where('language_id', $languageId);
        })
        ->when($groupId, function ($query, $groupId) {
            $query->where('group_id', $groupId);
        })
        ->orderBy(Student::select('name')->whereColumn('students.id', 'studentlanguages.student_id'),$sort
        )
        ->paginate(2);

    $languages = Language::all();
    $groups = Group::all();

    return view('studentlanguages.index', compact('studentlanguages', 'languages', 'groups', 'sort'));
}
    public function create() {
        $languages=Language::all();
        $groups=Group::all();
        $students=Student::all();
    return view('studentlanguages.create', compact('students','groups','languages'));
    }

public function store(Request $request)
{
        $validatedData = $request->validate( ['student_id' => 'required',
                                                    'language_id' => 'required',
                                                    'group_id' => 'required',
        ]);

        Studentlanguage::create( $validatedData);
        return redirect()->route('studentlanguages.index')->with('success',"studentlanguage has been created");
}



    public function edit(string $id)
    {
        $studentlanguages = Studentlanguage::findOrFail($id);
            $students=Student::all();
            $languages=Language::all();
            $groups=Group::all();
        return view("studentlanguages.edit", compact('studentlanguages','students','languages','groups'));
    }

    public function update(Request $request, string $id)
    {
        $studentlanguages = Studentlanguage::findOrFail($id);
        $validatedData = $request->validate( ['student_id' => 'required',
                                                    'language_id' => 'required',
                                                    'group_id' => 'required',
        ]);
                $studentlanguages->update( $validatedData);
        return redirect()->route('studentlanguages.index');
    }

    public function destroy(Studentlanguage $studentlanguage)
    {
        $result = $studentlanguage ->delete();
        if($result){
            return redirect()->route('studentlanguages.index')->with('success', "Studentlanguage was deleted with success");
        }
        else {
            return redirect()->route('studentlanguages.index')->with('error', "failed to delete Studentlanguage");
        }
        }
    }

