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
        // 相當於是 SELECT * FROM 'pigs 然後 fetchAll
        $data = DB::table('pigs')->get();
        return view('pig.index', ['data' => $data]);

        // $data['pigs'] = DB::select('SELECT * FROM pigs');
        // $data['dogs'] = DB::select('SELECT * FROM dogs');
        // // dd($data);
        // return view('pig.index',['data'=>$data]);

        // DB::table('pigs')->insert([
        //     'name' => 'Funny',
        //     'mobile' => '0977',
        //     'address' => '彰化縣'
        // ]);

        // $affected = DB::table('dogs')
        //       ->where('id', 6)
        //       ->update(['name' => 'Guy']);
        // dd($affected);

        // return view('user.index', ['users' => $users]);
        
        // $url = route('pigs.edit', ['pig' => 1]);
        // dd($url);
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
        $now=now();
        //進行請求數據的驗證（validation）
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
    
        DB::table('pigs')->insert([
            'name' => $validatedData['name'],
            'mobile' => $validatedData['mobile'],
            'address' => $validatedData['address'],
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    
        $data = DB::table('pigs')->get();
        return redirect()->route('pigs.index', ['data' => $data])->with('success', 'Pig added successfully.');
        // $input=$request->except('_token');
        // dd($input);
        // dd($request);
        // dd("pig store ok!");
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
        $now=now();
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
                    'address' => $validatedData['address'],
                    'updated_at' => $now,
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
