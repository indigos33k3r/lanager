<?php

namespace Zeropingheroes\Lanager\Http\Controllers\Api;

use Zeropingheroes\Lanager\Http\Controllers\Controller;
use Zeropingheroes\Lanager\Http\Resources\User as UserResource;
use Zeropingheroes\Lanager\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return UserResource::collection(User::orderBy('username')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \Zeropingheroes\Lanager\User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        $user->load('accounts');
        return new UserResource($user);
    }
}
