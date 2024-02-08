<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Auth::user());
    }

    public function store(UserRequest $request): UserResource
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole($request->role);

        return new UserResource($user);
    }

    public function update(UserRequest $request, User $user): UserResource
    {
        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->syncRoles($request->role);

        return new UserResource($user);
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return response()->json(['message'=>'Deleted successfully.'], 200);
    }

    public function allUsers(): AnonymousResourceCollection
    {
        return UserResource::collection(User::all());
    }

    public function specificUser(User $user): UserResource
    {
        return new UserResource($user);
    }
}
