<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(
            User::query()->orderBy('id', 'desc')->paginate(10)
        );
    }

    public function users(Request $request)
    {
        $users = User::with('type');
        if ($request->has('type') && $request->type == 1)
            $users = $users->where('type', $request->type);
        $users = $users->orderBy('id', 'desc')->paginate(10);
        return response()->json($users, 200);
        // return UserResource::collection(
        //     $users->orderBy('id', 'desc')->paginate(10)
        // );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        return Response(new UserResource($user), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = $user->load('type');
        return response()->json($user, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        if (isset($data)) {
            $data['password'] = bcrypt($data['password']);
        }
        $user->upadate($data);
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response('', 204);
    }
    public function companyUsers(Request $request)
    {
        $users = User::with('type');
        if ($request->has('type') && $request->type)
            $users = $users->where('type', $request->type);
        if ($request->has('company_id') && $request->company_id)
            $users = $users->where('company_id', $request->company_id);

        $users = $users->orderBy('id', 'desc')->paginate(10);
        return response()->json($users, 200);
        // return UserResource::collection(
        //     $users->orderBy('id', 'desc')->paginate(10)
        // );
    }
}
