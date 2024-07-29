<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Mobile;
use App\Models\Love;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data=Student::all();
        $data=Student::with('mobileRelation')->with('love')->get(); // with 預載入
        // dd($data[0]);
        // foreach ($data as $key => $value) {
        //     echo "$value->name <br>";
        //     foreach ($value->love as $key2 => $value2) {
        //         echo "&nbsp;&nbsp;&nbsp;&nbsp;$value2->love <br>";
        //     }
        // }
        
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
        $loves=$input['love'];
        $loveArr=explode(',', $loves);
        // dd($loveArr);

        //學生
        $data = new Student; 
        $data->name = $input['name']; 
        $data->save(); 

        //手機
        $id=$data->id;
        $item = new Mobile; 
        $item->student_id = $id; 
        $item->mobile = $input['mobile']; 
        $item->save();
        
        //愛好
        $id=$data->id;
        foreach ($loveArr as $value) {
            $itemlove = new Love; 
            $itemlove->student_id = $id; 
            $itemlove->love = $value; 
            $itemlove->save();
        }
        
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $id=$student->id;
        $data = Student::findOrFail($id);
        return view('student.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        // dd("student edit ok! $student");
        $data = Student::where('id',$student->id)->with('mobileRelation')->with('love')->first();
        // dd($data);
        return view('student.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'mobile' => 'required|string|max:15',
        // ]);

        // $student->update([
        //     'name' => $request->input('name'),
        // ]);

        // // 更新關聯的 mobile 資料
        // $student->mobileRelation->update([
        //     'mobile' => $request->input('mobile'),
        // ]);

        $input=$request->except('_token','method');

        // 更新學生資料
        $id=$student->id;
        $data=Student::where('id',$id)->first();
        $data->name=$input['name'];
        $data->save();
        
        // 更新手機資料
        // 方法二、先把子表資料刪除，再新增資料        
        Mobile::where('student_id',$id)->delete();

        $item=new Mobile;
        $item->student_id = $id; 
        $item->mobile = $input['mobile']; 
        $item->save();

        // 方法一、直接更新子表資料
        // $data=Mobile::where('student_id',$id)->first();
        // $data->mobile=$input['mobile'];
        // $data->save();
        
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->mobileRelation()->delete();
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
