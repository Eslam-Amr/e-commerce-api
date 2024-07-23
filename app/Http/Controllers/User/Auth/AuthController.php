<?php

namespace App\Http\Controllers\User\Auth;

use App\ApiTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\Auth\AuthResource;
use App\Http\Resources\User\Auth\UserAuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller implements HasMiddleware
{
    public static function middleware(){
        return [
        new Middleware('guest', except: ['logout'])
    ];
    }
    use ApiTrait;
    public function register(RegisterRequest $request){
$user=User::create($request->validated());
return $this->apiResponse(AuthResource::make($user,'user-token'),'user created successfully',201);
    }
    public function login(LoginRequest $request){

        if(Auth::attempt($request->validated())){
            $user = Auth::user();
return $this->apiResponse(AuthResource::make($user,'user-token'),'user loggged in  successfully',200);
}else{
            return $this->returnError('user creadential does\'t exist ',201);

        }
    }
    public function getCurrentGuard()
    {
        $currentGuard = null;

        foreach (array_slice(config('auth.guards'), -3, 3, true) as $guard => $guardConfig) {
            if (Auth::guard($guard)->check()) {
                $currentGuard = $guard;
                break;
            }
        }

        return $currentGuard;
    }

    public function showCurrentGuard()
    {
        $currentGuard = $this->getCurrentGuard();

        if ($currentGuard) {
            return response()->json([
                'message' => "You are logged in using the $currentGuard guard.",
            ]);
        } else {
            return response()->json([
                'message' => 'No guard is currently authenticated.',
            ]);
        }
    }
}
