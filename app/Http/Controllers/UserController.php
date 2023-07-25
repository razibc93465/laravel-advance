<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $user = new User();
        $user->name = 'Test Name';
        $user->email = 'test@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        dd($user);
    }

    public function create()
    {
        // update via create function to lessen time

        $user = User::find(1);
        $user->name = 'Test Name1';
        $user->email = 'test1@gmail.com';
        $user->password = Hash::make('123456789');
        $user->update();

        dd('Updated');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        User::findOrFail($id)->delete();
        dd('deleted');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
