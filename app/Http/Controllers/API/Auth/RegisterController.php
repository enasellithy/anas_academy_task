<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\RegisterRequest;
use App\SOLID\Services\AuthService;
use App\SOLID\Traits\JsonTrait;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use JsonTrait;
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $r)
    {
        $this->authService->register($r->except('password_confirm'));
        return $this->whenDone('');
    }
}
