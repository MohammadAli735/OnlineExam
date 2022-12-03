<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPasswordUpdateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\ProfileServices;

class ProfileController extends Controller
{
    public function profile()
    {
        $admin = resolve(ProfileServices::class)->profile();
        return UserResource::collection($admin);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        resolve(ProfileServices::class)->update($request, $data, $user);
        return response(['message' => 'success updating']);
    }
    public function changePWD(UserPasswordUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        resolve(ProfileServices::class)->changePWD($data,$user);
        return response(['message' => 'success updating']);
    }
}
