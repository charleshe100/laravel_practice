<?php

namespace App\Http\Controllers;

use App\Models\Love;
use Illuminate\Http\Request;

class LoveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd('love index ok!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Love $love)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Love $love)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Love $love)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Love $love)
    {
        //
    }
}
