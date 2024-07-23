<?php

namespace App\Http\Controllers\Seller\Auth;

use App\ApiTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\Auth\AuthResource;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;

class SellerAuthController extends Controller
{
    use ApiTrait;

    public function login(LoginRequest $request){

        $seller = Seller::where('email', $request->validated()['email'])->first();
        if ($seller && Hash::check($request->validated()['password'], $seller->password)) {
return $this->apiResponse(AuthResource::make($seller,'seller-token'),'user loggged in  successfully',200);
        }
        return $this->returnError('User credentials do not exist', 401);
    }

}
