<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class AdminCredentialsController extends Controller
{
    public function getAdmins()
    {
        $adminsData = Admin::all();
        $data = [
            'status' => 200,
            'admins' => $adminsData,
        ];

        return response()->json($data, 200);

    }

    public function addAdmin(Request $request)
    {
        $adminName = $request->name;
        $password = $request->password;
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:50',
            'email'=>'required|email|unique:admins,email',
            'phone'=>'required|unique:admins,phone',
            'role'=> ['required', 'in:media buyer, human resources, content creator, 
                                    media production, account manager, designer'],
            'password'=>['required',

                function ($attribute, $password, $fail) use ($adminName){
                    if (preg_match('/\d{3,}/', $password)){
                        $fail("The password cannot contain 3 or more consecutive digits");
                    }
                    if (stripos($password, $adminName) !== false){
                        $fail("The password cannot contain the admin's name");
                    }
                }
            ]
        ]);

        if ($validator->fails())
        {
            $data = [
                'message' => $validator->messages(),
                'status' => 422
            ];

            return response()->json($data, 422);
        }

        else
        {
            $admin = new Admin;
            $admin->name = $request->name;
            $hashed_pass = Hash::make($request->password);
            $admin->password = $hashed_pass;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->role = $request->role;

            $admin->save();
            // $admin->sendEmailVerificationNotification();
            $data = [
                'message' => 'admin added successfully',
                'status' => 200
            ];

            return response()->json($data, 200);
        }
    }

    public function editAdmin(Request $request, $id)
    {
        $adminName = $request->name;
        $validator = Validator::make($request->all(),[
        'name'=>'sometimes|required|max:50',
        'email'=>'sometimes|required|email|unique:admins,email',
        'phone'=>'sometimes|required|unique:admins,phone',
        'role'=> ['sometimes|required', 'in:media buyer, human resources, content creator, 
                                media production, account manager, designer'],
        'password'=>['sometimes|required',

            function ($attribute, $password, $fail) use ($adminName){
                if (preg_match('/\d{3,}/', $password)){
                    $fail("The password cannot contain 3 or more consecutive digits");
                }
                if (stripos($password, $adminName) !== false){
                    $fail("The password cannot contain the admin's name");
                }
            }
        ]]);
        try
        {
            $admin = Admin::findOrFail($id);
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception)
        {
            $data = [
            'message' => "This admin cannot be found",
            'status' => 404
            ];

            return response()->json($data, 404);
        }

        $admin->fill($request->only(['name', 'email', 'phone', 'role']));
        if ($request->has('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        $data = [
            'message' => 'admin updated successfully',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getAdmin($id)
    {
        try
        {
            $admin = Admin::findOrFail($id);

            $data = [
                'admin' => $admin,
                'status' => 200
            ];

            return response()->json($data, 200);
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception)
        {
            $data = [
            'message' => "This admin cannot be found",
            'status' => 404
            ];

            return response()->json($data, 404);
        }
    }

    public function deleteAdmin($id)
    {
        try
        {
            $admin = Admin::findOrFail($id);

            $admin->delete();

            $data = [
                'message' => "admin deleted successfully",
                'status' => 200
            ];

            return response()->json($data, 200);
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception)
        {
            $data = [
            'message' => "This admin cannot be found",
            'status' => 404
            ];

            return response()->json($data, 404);
        }
    }
}

