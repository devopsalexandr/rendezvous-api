<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchUsersController extends Controller
{
    public function index(Request $request, User $user): JsonResource
    {
        $payload = [];

        foreach ($request->all() as $key => $value){

            if($key == 'page') continue;

            $payload[] = [$key, $value];
        }

        if(count($payload) === 0){
            $payload[] = ['city', $request->user()->city];
        }

        $users = $user->where($payload)->paginate(21);

        return UserResource::collection($users);
    }
}
