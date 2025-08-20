<?php
namespace App\Http\Controllers;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{

   public function index(Request $request) {
        $languages=Language::all();
    return view('languages.index', compact('languages'));
}


    public function create() {

        return view('languages.create');
    }

    public function store(Request $request)
{
        //validation
        $validatedData = $request->validate( ['name' => 'required'
        ]);
        //creation
        Language::create( $validatedData);
        return redirect()->route('languages.index')->with('success',"Language has been created");
}

    public function edit(string $id)
    {
        return view("languages.edit");
    }

    public function update(Request $request, string $id)
    {
        return redirect()->route('languages.index');
    }

    public function destroy(Language $language)
    {

            return redirect()->route('languages.index')->with('error', "couldn't delete the Language");
        }
    }

