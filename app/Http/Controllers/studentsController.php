<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;


class studentsController extends Controller
{
    public function index(){
        $students = Students::all();
        return view('students.add_students', ['students' => $students]);
    }

    public function get($id) {
        $qry = Students::where('studno', $id)->first();
        dd($qry);
    }

    public function store(Request $request) { 
        // Validate the input fields
        $request->validate([
            'fname' => 'required|string|max:50',
            'mname' => 'nullable|string|max:50',
            'lname' => 'required|string|max:50',
            'sname' => 'nullable|string|max:50',
            'gender' => 'required|in:M,F',
            'bdate' => 'required|date|before:today'
        ]);
    
        // Insert data into the database
        $qry = Students::create([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'sname' => $request->sname,
            'gender' => $request->gender,
            'bdate' => $request->bdate
        ]);
    
        return ($qry) 
            ? redirect('/')->with('success', 'Student registered successfully!') 
            : redirect('/')->with('error', 'Failed to register student.');
    }
    
    public function updateView($id) {
        $qry = Students::where('studno', $id)->first();
        return view('students.updateStudentView', ['student' => $qry]);
    }

public function update(Request $request, $id) {
    // Validate the input fields
    $request->validate([
        'fname' => 'required|string|max:50',
        'mname' => 'nullable|string|max:50',
        'lname' => 'required|string|max:50',
        'sname' => 'nullable|string|max:50',
        'gender' => 'required|in:M,F',
        'bdate' => 'required|date|before:today'
    ]);

    // Find the student by ID
    $qry = Students::where('studno', $id)->first();
    if (!$qry) {
        return redirect('/')->with('error', 'Student not found.');
    }

    // Update student data
    $qry->update([
        'fname' => $request->fname,
        'mname' => $request->mname,
        'lname' => $request->lname,
        'sname' => $request->sname,
        'gender' => $request->gender,
        'bdate' => $request->bdate
    ]);

    return $qry->wasChanged()
        ? redirect('/')->with('success', 'Student updated successfully!')
        : redirect('/')->with('error', 'No changes made to the student.');
}

    public function delete($id)  {
        $qry = Students::where('studno', $id)->delete();
        return ($qry) 
            ? redirect('/')->with('success', 'Student deleted successfully!') 
            : redirect('/')->with('error', 'Failed to delete student.');
    }
}
