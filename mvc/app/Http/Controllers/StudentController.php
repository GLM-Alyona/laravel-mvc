<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StudentRequest;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        //
        $student = new Student;

        //$student->group_id = $request->input('group_id');
        //$student->surname = $request->input('surname');
        //$student->name = $request->input('name');

        $student->fill($request->all());
        $student->save();

        return redirect()->route('students.index')->with('success', "Студент $student->surname $student->name зачислен в группу № $student->group_id");
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student)
    {
        //$model = Student::findOrFail($student->id);

        //$model->fill([
        //    'group_id' => $request->get('group_id'),
        //    'surname'=> $request->get('surname'),
        //    'name'=> $request->get('name')
        //]);

        $student->fill($request->all());

        $student->save();
        return redirect()->route('students.index')->with('success', 'Студент успешно откорректирован');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //$model = Student::findOrFail($student->id);
        //$model->delete();
        $student->delete();
        return redirect()->route('students.index')->with('success', "Студент $student->surname $student->name успешно отчислен.");
    }
}