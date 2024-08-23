<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bodyText = DB::table('body_texts')->where('id', '=', 1)->get();
        $choices = DB::table('choices')->where('comes_from', '=', 1)->get();

        return view('game', ['bt' => $bodyText, 'c' => $choices]);
    }

    public function unroll(Request $request)
    {
        $bodyText = DB::table('body_texts')->where('id', '=', $request->id)->get();
        $choices = DB::table('choices')->where('comes_from', '=', $request->id)->get();

        return view('game', ['bt' => $bodyText, 'c' => $choices]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
