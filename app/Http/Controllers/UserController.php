<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->get();

        return UserResource::collection($users)->all();
    }

    public function store(UserRequest $request)
    {
        $user = User::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role') ?? 'User',
            'company_id' => $request->input('company_id'),

        ]);

        return new UserResource($user);
    }

    public function view(User $user)
    {
        return new UserResource($user);
    }

    public function update(User $user, UserRequest $request)
    {
        $user->query()->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role') ?? 'User',
            'company_id' => $request->input('company_id'),
        ]);

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json()->setStatusCode(204);
    }
}

