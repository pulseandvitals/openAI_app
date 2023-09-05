<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
    {
        $user = User::query()
            ->get();

        return Inertia::render('User/Index', [
            'users' => UserResource::collection($user),
        ]);
    }

    public function create()
    {
        dd('create function');
    }

    public function show(User $user)
    {
        dd($user);
    }

    public function destroy(User $user)
    {
        dd($user);
    }

    public function edit(User $user)
    {
        dd($user);
    }
}
