<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index()
    {
        return view('users.home', [
            'users' => User::get()
        ]);
    }

    public function edit(User $id)
    {

    	return view('users.edit', [
    		'usuario' => $id
    	]);
    }

    public function update(User $id)
    {
    	$id->update([
    		'name' => request('name'),
    		'email' => request('email'),
    		'level' => request('level'),
    	]);

    	return redirect()->route('users');
    }
}
