<?php

namespace App\SOLID\Repositories;

use App\Http\Resources\API\UserResource;
use App\Mail\ResetPasswordEmail;
use App\Models\User;
use App\SOLID\Traits\JsonTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthRepository
{
    use JsonTrait;

    public function register(array $data)
    {
       return User::create($data);
    }

    public function login(array $data)
    {
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            $user = Auth::user();
            return $this->whenDone([
                'token' => 'Bearer '.$user->createToken('MyApp')->plainTextToken,
                'user' => new UserResource($user)
            ]);
        }
        else{
            return $this->whenError('Error Try Again Later');
        }
    }

    public function updateProfile(array $data)
    {
        User::where('id',auth()->user()->id)->update($data);
        return $this->whenDone([
            'user' => new UserResource(auth()->user()),
        ]);
    }

    public function reset_password(array $data)
    {
        $user = User::where('email',$data['email']);
        if($user->count() == 0){
            return $this->whenError('','Email Not Found');
        }else{
            Mail::to($user->first()->email)->send(new ResetPasswordEmail($data));
            return $this->whenDone('','done');
        }
    }

    public function updatePassword(array $data)
    {
        $user = User::where('email',$data['email']);
        $userId = $user->firstOrFail()->id;
        User::where('id', $userId)->update([
            'password' => $data['password'],
        ]);
        return $this->whenDone('','done');
    }
}
