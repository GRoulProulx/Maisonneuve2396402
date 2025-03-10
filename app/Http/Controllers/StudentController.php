<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $students = Student::paginate(10);

        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('student.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string | min:4 | max:100',
            'address' => 'required | string | min:4 | max:100',
            'phone' => 'required | min:7',
            'email' => 'required|email',
            'date_of_birth' => 'required|date',
        ]);

        $student = Student::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'city_id' => $request->city_id
        ]);

        return redirect()->route('student.show', $student->id)->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $cities = City::all();
        return view('student.edit', ['student' => $student, 'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required | string | max:100',
            'address' => 'required | string | max:100',
            'phone' => 'required',
            'email' => 'required|email',
            'date_of_birth' => 'required|date',
        ]);

        $student->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'city_id' => $request->city_id,
        ]);

        return redirect()->route('student.show', $student->id)->with('success', 'Informations updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $name = $student->name;
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student with the name ' . $name . ' has been deleted!'); 
    }
}
