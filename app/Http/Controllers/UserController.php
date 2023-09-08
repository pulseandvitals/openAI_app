<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Str;
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
            'counts' => [
                    'admin' => $user->where('role',User::ADMIN)->count(),
                    'user' => $user->where('role', User::USER)->count(),
                    'total' => $user->count()
            ],
        ]);
    }

    public function create()
    {
        return Inertia::render('User/Create', [
            'generatedPassword' => Str::random(6),
        ]);
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
