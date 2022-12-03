<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class ProfileServices
{
    public function profile()
    {
        return User::where('role', 1)->get();
    }
    public function update( $request,$data,$user)
    {

        if ($request->image !== null) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = Str::random() . '.' . $extension;
            $data['image'] = $request->file('image')->move('upload/admin/image', $imageName);
             if($user->image!==null){
                unlink($user->image);
            }
        }
        $user->update($data);
    }

    public function changePWD($data, $user)
    {
    
        if (Hash::check($data['oldpwd'], $user->password)) {
            $data['password'] = Hash::make($data['password']);
            $user->update(['password' => $data['password']]);
        }

    }
}
