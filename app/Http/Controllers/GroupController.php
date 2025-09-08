<?php

namespace App\Http\Controllers;
use App\Models\Group;
use App\Models\Language;
use Illuminate\Http\Request;

class GroupController extends Controller
{

   public function index(Request $request) {
    $sort = $request->input('sort', 'asc');
    $groups = Group::with('language')
                   ->orderBy('language_id', $sort)
                   ->paginate(8)->appends(request()->query());
    return view('groups.index', compact('groups','sort'));
}


    public function create() {
        $languages=Language::all();
    return view('groups.create', compact('languages'));
    }

    public function store(Request $request)
{
        //validation
        $validatedData = $request->validate( ['name' => 'required',
                                                    'language_id' => 'required',
                                                    'level' => 'required',
        ]);
        //creation
        Group::create( $validatedData);
        return redirect()->route('groups.index')->with('success',"group has been created");
}

    public function edit(string $id)
    {
         $groups=Group::findOrFail($id);
    $languages=Language::all();
        return view("groups.edit", compact('groups', 'languages'));
    }

    public function update(Request $request, string $id)
    {
        $groups = Group::findOrFail($id);

        $validatedData = $request->validate( ['name' => 'required',
                                                    'language_id' => 'required',
                                                    'level' => 'required'
        ]);
                $groups->update( $validatedData);
        return redirect()->route('groups.index');
    }

    public function destroy(Group $group)
    {
                $result = $group ->delete();
        if($result){
            return redirect()->route('groups.index')->with('success', "group was deleted with success");
        }
        else {
            return redirect()->route('groups.index')->with('error', "failed to delete group");
        }
        }
    }

