<?php

namespace App\Http\Controllers\Admin\Auth\Admin;

use App\ApiTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\Auth\AuthResource;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    use ApiTrait;

    public function login(LoginRequest $request){

        $admin = Admin::where('email', $request->validated()['email'])->first();
        if ($admin && Hash::check($request->validated()['password'], $admin->password)) {
return $this->apiResponse(AuthResource::make($admin,'admin-token'),'user loggged in  successfully',200);
        }
        return $this->returnError('User credentials do not exist', 401);
    }

}














/*
        if(Auth::guard('admin-api')->attempt($request->validated())){
            $admin = Auth::guard('admin-api')->user();

return $this->apiResponse(AdminAuthResource::make($admin),'user loggged in  successfully',200);
}else{
            return $this->apiResponse(null,'user creadential does\'t exist ',201);

        }

*/
