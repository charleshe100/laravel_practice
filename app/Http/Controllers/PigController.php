<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pig.index');
        // $url = route('pigs.edit', ['pig' => 1]);
        // dd($url);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd("fish create ok");
        return view('pig.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->except('_token');
        dd($input);
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
        // dd("fish edit ok.");
        return view('pig.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return view('pig.delete');
    }
}
