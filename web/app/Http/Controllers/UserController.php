<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $password = rand(100000,900000);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'age' => $request->age,
            'email' => $request->email,
            'password' => Hash::make($password),
            'default_password' => $password
        ]);
        return redirect()->route('user.index')->with('success','เพิ่มผู้ใช้สำเร็จ! รหัสผ่านสำหรับ ' . $request->email . ' คือ ' . $password);
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
        $user = User::where('id', $id)->first();
        return view('admin.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
        $validated = $request->validated();
        $user = User::find($id);
        $user->update($validated);
        return redirect()->route('user.index')->with('success','แก้ไขผู้ใช้สำเร็จ!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('user.index')->with('success','ลบผู้ใช้สำเร็จ!');
    }

    public function reset_password($id)
    {
        $password = rand(100000,900000);
        $user = User::find($id);
        $user->update([
            'password' => Hash::make($password),
            'default_password' => $password
        ]);

        return redirect()->route('user.index')->with('success','รีเซ็ตรหัสผ่านสำเร็จ! รหัสผ่านสำหรับ ' . $user->email . ' คือ ' . $password);
    }
}
