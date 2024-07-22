<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Mobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Student::all();
        return view('student.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->except('_token');

        //學生
        $data = new Student; 
        $data->name = $input['name']; 
        $data->save(); //用save()的方式，就不用再特地去設定時間，它直接會儲存時間

        //手機
        $id=$data->id;
        $data = new Mobile; 
        $data->student_id = $id; 
        $data->mobile = $input['mobile']; 
        $data->save();
        
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        // $data = DB::table('students')->where('id', $id)->first();        
        // return view('student.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // $now=now();
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'mobile' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        // ]);
        // DB::table('students')
        //       ->where('id', $id)
        //       ->update([
        //             'name' => $validatedData['name'],
        //             'mobile' => $validatedData['mobile'],
        //             'address' => $validatedData['address'],
        //             'updated_at' => $now,
        //             ]);
        
        // return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // DB::table('students')->where('id', $id)->delete();
        // return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
