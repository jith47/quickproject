<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
        $users = User::with('type')
            ->with('details');
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
        $user = $user->load(['type', 'details', 'likes', 'givenBy']);
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
    public function updateProfilePic(Request $request)
    {
        $user_id = $request->user_id;
        $full_path = '';
        $user = UserDetails::where('user_id', $user_id)->first();

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $file_size = $file->getSize();
            $file_extension = $file->getClientOriginalExtension();
            $validFileExtensions = ["jpg", "jpeg", "bmp", "gif", "png", 'mp4', 'mkv', 'avi'];
            if (in_array($file_extension, $validFileExtensions)) {
                $new_file_name = uniqid() . '_' . trim($file->getClientOriginalName());
                // $destination_path = public_path('/../../public/media/messages');
                // $file->move($destination_path, $new_file_name);
                
                $fileName = $new_file_name;
                $filePath = 'avatars/' . $fileName;
                Storage::disk('public')->put($filePath, $file);
                $full_path = url('/') . '/public/' . $filePath;
                // $patht =  $string."/app/media/" . $new_file_name . '.' . $file_extension;
                // $path = Storage::disk('s3')->put(''.$patht, $file,'public');
                if ($user->profile_pic != null) {
                    if (File::exists($user->profile_pic)) {
                        File::delete($image_path);
                    }
                }
            }
        }
        if ($full_path != null) {
            $user->profile_pic = $full_path;
            $user->save();
        }
        return response()->json($user, 200);
    }
    // public function test() {
    //     $user = UserDetails::all();
    //     foreach($user as $usr) {
    //         $usr->profile_pic = 'http://localhost:8000/' . $usr->profile_pic; 
    //     $usr->cover = 'http://localhost:8000/' . $usr->cover; 
    //     $usr->save();
    //     }
        
    // }
}
