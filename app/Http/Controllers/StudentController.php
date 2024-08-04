<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Mobile;
use App\Models\Love;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

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
        $loveArr=[];
        foreach ($data->love as $value) {
            array_push($loveArr,$value->love);
        } 
        $loves=implode(",",$loveArr);
        $data['loves']=$loves;
        return view('student.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $id=$student->id;
        $data = Student::where('id',$id)->with('mobileRelation')->with('love')->first();
        // $data['loves']='php,laravel,js';  //可用此方法直接新增一個欄位loves
        
        $loveArr=[];
        foreach ($data->love as $value) {
            // 將love的所有資料放進loveArr陣列中
            array_push($loveArr,$value->love);
        }   
        // dd($loveArr);
        $loves=implode(",",$loveArr);
        $data['loves']=$loves;
        return view('student.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $input=$request->except('_token','_method');
        // dd($input);
        $loves=$input['love'];
        $loveArr=explode(",",$loves);
        // dd($loveArr);

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

        // 更新愛好資料
        Love::where('student_id',$id)->delete();
        foreach ($loveArr as $value) {
            $itemLove=new Love;
            $itemLove->student_id = $id; 
            $itemLove->love = $value; 
            $itemLove->save();
        }        
        
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //用 Eloquent 關聯方法來刪除資料
        $student->love()->delete();
        $student->mobileRelation()->delete();
        $student->delete();

        //直接用查詢方式來刪除資料
        //Love::where('student_id',$student->id)->delete();
        //Mobile::where('student_id',$student->id)->delete();
        //Student::where('id',$student->id)->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    public function excel() 
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
}
