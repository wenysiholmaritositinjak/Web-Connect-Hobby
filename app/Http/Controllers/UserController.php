<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function indexAPI()
    {
        $users = User::all();
    
        $responseData = [];
        foreach ($users as $user) {
            $userData = $user->toArray();
            $userData['links'] = $user->getLinks(); // Include HATEOAS links
            $responseData[] = $userData;
        }
    
        return response()->json(['data' => $responseData]);
    }
    public function index()
    {

        return view('user.index');
    }

    public function showAPI($id)
    {
        $user = User::find($id);
    
        if ($user) {
            return response()->json([
                'data' => $user,
                'links' => $user->getLinks(),
            ]);
        } else {
            return response()->json([
                'error' => 'User not found',
            ], 404);
        }
    }
    


 public function storeAPI(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 422,
            'errors' => $validator->messages()
        ], 422);
    } else {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($user) {
            return response()->json([
                'status' => 200,
                'message' => "User Created Successfully",
                'links' => $user->getLinks(),
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "Something Went Wrong"
            ], 500);
        }
    }
}

public function updateAPI(Request $request, int $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'required|string|min:6',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 422,
            'errors' => $validator->messages()
        ], 422);
    } else {
        $user = User::find($id);
        if ($user) {
            return response()->json([
                'status' => 200,
                'message' => "User Updated Successfully",
                'data' => $user,
                'links' => $user->getLinks(),
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such User Found!"
            ], 404);
        }
    }
}

    public function edit(User $user)
    {
        return view('User.edit', compact('user'));
    }

    public function update(UserFormRequest $request, User $user)
    {
        $validatedData = $request->validated();

        $user->name = $validatedData['name'];
        $user->First_Name = $validatedData['First_Name'];
        $user->Last_Name = $validatedData['Last_Name'];
        $user->status = $validatedData['status'];
        $user->Location = $validatedData['Location'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->gender = $validatedData['gender'];

        // Menghapus foto profil lama jika ada
        if ($request->hasFile('profile_path')) {
            $path = 'uploads/profile_path/' . $user->profile_path;
        if (File::exists($path))
            {
            File::delete($path);
            }

            $file = $request->file('profile_path');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/profile_path', $filename);
            $user->profile_path = $filename;
         } elseif (!$user->profile_path) {
            $user->profile_path = 'default.jpg';
        }

        $user->save();

        return redirect()->route('user.edit', $user->id)
            ->with('success', 'Profil berhasil diperbarui!');
}

public function deleteAPI($id)
{
    $user = User::find($id);

    if ($user) {
        $user->delete();

        // Include HATEOAS links
        $response = [
            'status' => 200,
            'message' => 'User Deleted Successfully',
            'links' => [
                'all_users' => [
                    'href' => '/api/users',  // Adjust the URI as needed
                    'method' => 'GET',
                    'type' => 'application/json',
                    'description' => 'Get the list of all users',
                ],
            ],
        ];

        return response()->json($response, 200);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'No Such User Found!',
        ], 404);
    }
}

}

