<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas=DB::select('SELECT * FROM pigs');        
        return view('pig.index',['datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pig.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('pigs')->Insert([
            'name' => $_POST['name'],
            'mobile' => $_POST['mobile'],
            'address' => $_POST['address']
            ]);
        return view('pig.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('pigs')->where('id', $id)->first();        
        return view('pig.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
        DB::table('pigs')
              ->where('id', $id)
              ->update([
                    'name' => $validatedData['name'],
                    'mobile' => $validatedData['mobile'],
                    'address' => $validatedData['address']
                    ]);
        
        return redirect()->route('pigs.index')->with('success', 'Pig updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('pigs')->where('id', $id)->delete();
        return redirect()->route('pigs.index')->with('success', 'Pig deleted successfully.');
    }
}
