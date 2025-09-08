<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Language;
use App\Models\Studentlanguage;
use App\Models\Group;
use App\Models\Payment;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

public function index(Request $request)
{
    $search = $request->input('search');
    $languageId = $request->input('language_id');
    $groupId = $request->input('group_id');
    $dateFrom = $request->input('date_from');
    $dateTo = $request->input('date_to');

    $payments = Payment::query()
        ->when($search, function ($query) use ($search) {
            $query->whereHas('studentlanguage.student', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('family_name', 'like', "%{$search}%");
            });
        })
        ->when($languageId, function ($query) use ($languageId) {
            $query->whereHas('studentlanguage', function ($q) use ($languageId) {
                $q->where('language_id', $languageId);
            });
        })
        ->when($groupId, function ($query) use ($groupId) {
            $query->whereHas('studentlanguage', function ($q) use ($groupId) {
                $q->where('group_id', $groupId);
            });
        })
        ->when($dateFrom, function ($query) use ($dateFrom) {
            $query->whereDate('payment_date', '>=', $dateFrom);
        })
        ->when($dateTo, function ($query) use ($dateTo) {
            $query->whereDate('payment_date', '<=', $dateTo);
        })
        ->with('studentlanguage.student', 'studentlanguage.language', 'studentlanguage.group')
        ->paginate(10)
        ->appends(request()->query());

    $languages = Language::all();
    $groups = Group::all();

    return view('payments.index', compact('payments', 'languages', 'groups'));
}

    public function create() {

    $studentlanguages = Studentlanguage::with(['student','language','group'])
        ->orderBy('student_id')
        ->get();
    return view('payments.create', compact('studentlanguages'));
    }

public function store(Request $request)
{
        $validatedData = $request->validate( ['studentlanguage_id' => 'required',
                                                    'amount' => 'required',
                                                    'payment_date' => 'required',
        ]);

        Payment::create( $validatedData);
        return redirect()->route('payments.index')->with('success',"payment has been created");
}



    public function edit(string $id)
    {
        $payments = Payment::findOrFail($id);
    $studentlanguages = Studentlanguage::with(['student','language','group'])
        ->orderBy('student_id')
        ->get();
        return view("payments.edit", compact('studentlanguages','payments'));
    }

    public function update(Request $request, string $id)
    {
        $payments = Payment::findOrFail($id);
        $validatedData = $request->validate( ['studentlanguage_id' => 'required',
                                                    'amount' => 'required',
                                                    'payment_date' => 'required',
        ]);

        $payments->update( $validatedData);
        return redirect()->route('payments.index');
    }

    public function destroy(Payment $payment)
    {
        $result = $payment ->delete();
        if($result){
            return redirect()->route('payments.index')->with('success', "payment was deleted with success");
        }
        else {
            return redirect()->route('payments.index')->with('error', "failed to delete payment");
        }
        }
            public function calculate(Request $request) {

 // Filters
    $languageId = $request->input('language_id');
    $groupId = $request->input('group_id');
    $from = $request->input('from');
    $to = $request->input('to');
    $type = $request->input('type', 'student'); // student | group | language | all

    // Base query
    $query = Payment::query()
        ->with(['studentlanguage.student', 'studentlanguage.language', 'studentlanguage.group'])
        ->when($languageId, fn($q) => $q->whereHas('studentlanguage.language', fn($qq) => $qq->where('id', $languageId)))
        ->when($groupId, fn($q) => $q->whereHas('studentlanguage.group', fn($qq) => $qq->where('id', $groupId)))
        ->when($from, fn($q) => $q->whereDate('payment_date', '>=', $from))
        ->when($to, fn($q) => $q->whereDate('payment_date', '<=', $to));

    // Grouping logic
    if ($type === 'student') {
        $results = $query->get()->groupBy('studentlanguage.student.id')->map(function ($payments) {
            $student = $payments->first()->studentlanguage->student;
            return [
                'name' => $student->name . ' ' . $student->family_name,
                'amount' => $payments->sum('amount'),
            ];
        });
    } elseif ($type === 'group') {
        $results = $query->get()->groupBy('studentlanguage.group.id')->map(function ($payments) {
            $group = $payments->first()->studentlanguage->group;
            $language = $payments->first()->studentlanguage->language;
            return [
                'group' => $group->name,
                'language' => $language->name,
                'amount' => $payments->sum('amount'),
            ];
        });
    } elseif ($type === 'language') {
        $results = $query->get()->groupBy('studentlanguage.language.id')->map(function ($payments) {
            $language = $payments->first()->studentlanguage->language;
            return [
                'language' => $language->name,
                'amount' => $payments->sum('amount'),
            ];
        });
    } else { // all
        $results = [
            'total' => $query->sum('amount'),
        ];
    }

    // Needed data for filters
    $languages = \App\Models\Language::all();
    $groups = \App\Models\Group::all();

    return view('payments.calculate', compact('results', 'languages', 'groups', 'type'));
    }

    }

