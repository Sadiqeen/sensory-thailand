<?php

namespace App\Http\Controllers\Sensory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateTestController extends Controller
{

    // ================================ Create test information ============================

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_test_info()
    {
        return view('admin.sensory.create-test.test-info');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_test_info(Request  $request)
    {
        // save progress
        $request->session()->put('progress', 1);

        // save test information
        $test_info = [
            'test_name' => $request->test_name,
            'test_description' => $request->test_description
        ];
        $request->session()->put('sensory_test_info', $test_info);
        $request->session()->save();

        return redirect()->route('pretest.create');
    }

    // ================================= Create pretest =================================

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_pretest(Request  $request)
    {
        // dd($request->session()->get('sensory_pretest'));
        return view('admin.sensory.create-test.pretest');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_pretest(Request  $request)
    {
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

        $pretest = [
            'question' => $request->question,
            'test_choice' => $request->test_choice,
            'answer1' => $request->answer1,
            'answer2' => $request->answer2,
            'answer3' => $request->answer3,
            'answer4' => $request->answer4,
        ];

        // dd($pretest);
        $request->session()->put('sensory_pretest', $pretest);
        $request->session()->save();
    }
}
