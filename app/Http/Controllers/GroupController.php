<?php

namespace App\Http\Controllers;
use App\Models\Group;
use App\Models\Language;
use Illuminate\Http\Request;

class GroupController extends Controller
{

   public function index(Request $request) {
        $groups=Group::all();
    return view('groups.index', compact('groups'));
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
        return view("groups.edit");
    }

    public function update(Request $request, string $id)
    {
        return redirect()->route('groups.index');
    }

    public function destroy(Group $group)
    {

            return redirect()->route('groups.index')->with('error', "couldn't delete the Group");
        }
    }

