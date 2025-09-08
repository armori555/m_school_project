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
        $validatedData = $request->validate( ['name' => 'required',
                                                    'price' => 'required'
        ]);
        //creation
        Language::create( $validatedData);
        return redirect()->route('languages.index')->with('success',"Language has been created");
}

    public function edit(string $id)
    {    
    $languages=Language::findOrFail($id);
        return view("languages.edit", compact( 'languages'));
    }

    public function update(Request $request, string $id)
    {
    $languages=Language::findOrFail($id);
    $validatedData = $request->validate( ['name' => 'required', 'price' => 'required']);
                $languages->update( $validatedData);
        return redirect()->route('languages.index');
    }

    public function destroy(Language $language)
    {
        $result = $language ->delete();
        if($result){
            return redirect()->route('languages.index')->with('success', "language was deleted with success");
        }
        else {
            return redirect()->route('languages.index')->with('error', "failed to delete language");
        }
        }
    }

