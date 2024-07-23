<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    public function __construct($resource,public $tokenName)
    {
        parent::__construct($resource);
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request ): array
    {
        return [
            'token'=>$this->createToken($this->tokenName)->plainTextToken ,
            'name'=>$this->name ,
            'email'=>$this->email ,
            ];       }
}
