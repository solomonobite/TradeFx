<?php

namespace App\Http\Controllers\User\Auth;

//use view;
use App\Models\User;
//use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;



class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('user.dashboard', ['users' => $users]);
    }

    public function show($user)
    {
        $user = User::find(decrypt($user));
        return view('user.view-user', ['user' => $user]);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
