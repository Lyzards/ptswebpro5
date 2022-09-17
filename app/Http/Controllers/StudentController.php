<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::All();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('student.index')->with('success', 'Berhaslil menambahkan.');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'students' => 'required',
            'amount' => 'required',
        ]);
        $student->update($request->all());
        return redirect()->route('student.index')->with('success', 'Berhasil mengupdate');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Berhasil menghapus');
    }
}