<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->session()->has('progress')) {
            $progress = $request->session()->get('progress');
            if ($progress === 1) {
                return view('admin.test.create_pretest');
            }
            if ($progress === 2) {
                return view('admin.test.create_test');
            }
        } else {
            return view('admin.test.create_info');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->session()->has('progress')) {
            $request->validate([
                'test_name' => 'required|max:255',
                'test_description' => 'required|min:5',
            ]);
            $test_info = [$request->test_name, $request->test_description];
            $request->session()->put('test_info', $test_info);
            $request->session()->put('progress', 1);
            $request->session()->save();
            return redirect()->route('test.create');
        } else if ($request->session()->get('progress') == 1) {
            $request->validate([
                'question.*' => 'required|min:2|max:255',
                'test_choice.*' => 'required',
                'answer1.*' => 'required',
                'answer2.*' => 'required',
                'answer3.*' => 'required_unless:answer4.*,',
                'answer4.*' => ''
            ],
            [
                'answer3.*.required_unless' => 'The answer field is required unless answer 4 is in.',
            ]);
            $request->session()->put('progress', 2);
            $request->session()->save();
            return redirect()->route('test.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
    }
}
