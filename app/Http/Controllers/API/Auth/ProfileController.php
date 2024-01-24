<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\SOLID\Services\AuthService;
use App\SOLID\Traits\JsonTrait;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use JsonTrait;
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->whenDone('Logout Done');
    }

    public function updateProfile(Request $r)
    {
        return $this->authService->updateProfile($r->all());
    }
}
