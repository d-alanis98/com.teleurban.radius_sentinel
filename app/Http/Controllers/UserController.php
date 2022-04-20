<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Prophecy\Exception\Doubler\MethodNotFoundException;

class UserController extends Controller
{
    public function index(){
        $users = User::get();

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function createForm() {
        return view('users.create');
    }

    public function create(Request $request){

        $user = new User();
        $user->uri_user = sha1($request->email);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return Response($user);

    }

    public function show(Request $request, $uri_user) {
        try {
            $user = User::findOrFail($uri_user);
        } catch(ModelNotFoundException $e) {
            return Response('User not found', 404);
        }

        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function updateForm(Request $request, $uri_user) {
        try {
            $user = User::findOrFail($uri_user);
        } catch(ModelNotFoundException $e) {
            return Response('User not found', 404);
        }

        return view('users.update', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $uri_user) {
        try {
            $user = User::findOrFail($uri_user);
            if($request->filled('password'))
                $request->password = Hash::make($request->password);
            else $request->password = $user->password;
            $user->update(
                $request->all()
            );
        } catch(ModelNotFoundException $e) {
            return Response('User not found', 404);
        }

        return Redirect(dirname(url()->current()));
    }

    public function delete(Request $request, $uri_user) {
        try {
            $user = User::findOrFail($uri_user);
        } catch(ModelNotFoundException $e) {
            return Response('User not found', 404);
        }

        $user->delete();

        return Redirect('/users');
    }
}
