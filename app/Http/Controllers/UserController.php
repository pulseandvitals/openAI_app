<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
    {
        $user = User::query()
            ->orderBy('created_at')
            ->paginate(10);

        return Inertia::render('User/Index', [
            'users' => UserResource::collection($user),
        ]);
    }

    public function create()
    {
        return Inertia::render('User/Create', [
            'generatedPassword' => Str::random(6),
        ]);
    }

    public function show(User $user)
    {
        dd($user);
    }

    public function store(UserRequest $request,User $user)
    {
        $user = $user->create($request->only(
            'name',
            'email',
            'password',
            'role'
        ));

        return redirect()->route('user.index')->with('message','Successfully created user '. $user->name);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('message','Successfully deleted user '. $user->name);
    }

    public function update(UserRequest $request,User $user)
    {
        $user->update($request->only(
            'name',
            'email',
            'role'
        ));

        return redirect()->route('user.index')->with('message','Successfully updated '.$user->name);
    }
}
