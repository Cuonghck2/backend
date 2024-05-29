<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $users = $users->map(function ($user) {
            $user->unit = Unit::where('idUnit', $user->idUnit)->first();
            return $user;
        })->all();
        return response()->json($users, 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::where('idUser', $id)->first();
        if ($users) {
            $users->idUser = request('idUser');
            $users->fullName = request('fullName');
            $users->username = request('username');
            $users->idUnit = request('idUnit');
            $users->save();

            $units = Unit::where('idUnit', $users->idUnit)->first();
            $users->units = $units;

            return response()->json($users, 200);
        } else {
            return response()->json(['error' => 'Không tìm thấy dữ liệu'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::where('idUser', $id)->first();
        if ($users) {
            $users->delete();
            return response()->json($users, 200);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function register(Request $request)
    // {
    //     $validate = Validator::make($request->all(), [
    //         'idUser' => 'required|string|max:25',
    //         'fullName' => 'string|max:250',
    //         'username' => 'required|string|max:250|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //         'idUnit' => 'required|string|max:250'
    //     ]);

    //     if ($validate->fails()) {
    //         return response()->json([
    //             'status' => 'failed',
    //             'message' => 'Validation Error!',
    //             'data' => $validate->errors(),
    //         ], 403);
    //     }

    //     $user = User::create([
    //         'idUser' => $request->idUser,
    //         'fullName' => $request->fullName,
    //         'username' => $request->username,
    //         'password' => Hash::make($request->password),
    //         'idUnit' => $request->idUnit
    //     ]);
    //     $unit = Unit::where('idUnit', $request->idUnit)->first();
    //     $user->unit = $unit;


    //     $response = [
    //         'status' => 'success',
    //         'message' => 'User is created successfully.',
    //         'data' => $user,
    //         'token' => $user->createToken($request->username)->plainTextToken
    //     ];

    //     return response()->json($response, 201);
    // }

    // public function login(Request $request)
    // {
    //     $validate = Validator::make($request->all(), [
    //         'username' => 'required|string',
    //         'password' => 'required|string'
    //     ]);

    //     if ($validate->fails()) {
    //         return response()->json([
    //             'status' => 'failed',
    //             'message' => 'Validation Error!',
    //             'data' => $validate->errors(),
    //         ], 403);
    //     }

    //     $user = User::where('username', $request->username)->first();

    //     // Check password
    //     if (!$user || !Hash::check($request->password, $user->password)) {
    //         return response()->json([
    //             'status' => 'failed',
    //             'message' => 'Invalid credentials'
    //         ], 401);
    //     }

    //     $data['token'] = $user->createToken($request->username)->plainTextToken;
    //     $data['user'] = $user;

    //     $response = [
    //         'status' => 'success',
    //         'message' => 'User is logged in successfully.',
    //         'data' => $data,
    //     ];

    //     return response()->json($response, 200);
    // }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function logout(Request $request)
    // {
    //     $user = $request->user();

    //     if ($user) {
    //         $accessToken = $user->currentAccessToken();

    //         if ($accessToken) {
    //             $accessToken->delete();
    //         }
    //     }

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'User is logged out successfully'
    //     ], 200);
    // }


}