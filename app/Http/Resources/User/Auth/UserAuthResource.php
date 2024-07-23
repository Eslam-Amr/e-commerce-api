<?php

namespace App\Http\Resources\User\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//         $data['token']=$user->createToken('user-token')->plainTextToken;

// $data['name']=$user->name;
// $data['email']=$user->email;
return [
'token'=>$this->createToken('user-token')->plainTextToken ,
'name'=>$this->name ,
'email'=>$this->email ,
];
    }
}
