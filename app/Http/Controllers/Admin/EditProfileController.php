<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class EditProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.users.edit-profile')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit-profile')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required'],
        ]);

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number1' => $request->phone_number1,
            'phone_number2' => $request->phone_number2,
            'paid' => $request->paid,
            'paid_at' => $request->paid_at,
            'remaining' => $request->remaining,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.edit-profile.edit', "$user->id")->with('success', "Record updated Successfully");
    }
}
