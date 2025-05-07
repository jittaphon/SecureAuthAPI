<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Facades\JWTAuth;

use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{
    // ดึงข้อมูลจากฐานข้อมูลแล้วแจ้งเตือนผ่าน LINE
    public function getUser()
    {
        try {
            // ดึงข้อมูลจากฐานข้อมูล
            $users = DB::table('users')->get();

            // ส่งข้อมูลกลับไปยังผู้เรียก API
            return response()->json($users, 200);
            exit;
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch data: ' . $e->getMessage()
            ], 500);
        }
    }
    public function InsertNewUser(Request $request)
    {
        try {
            // ดึงข้อมูลจาก body JSON
            $data = $request->json()->all();

            // -------------------- ตรวจสอบข้อมูล --------------------
            if (!isset($data['name'], $data['lastName'], $data['email'], $data['password'], $data['confirmPassword'], $data['dob'], $data['gender'])) {
                return response()->json(['error' => 'Missing required fields'], 400);
            }

            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                return response()->json(['error' => 'Invalid email format'], 400);
            }

            if ($data['password'] !== $data['confirmPassword']) {
                return response()->json(['error' => 'Passwords do not match'], 400);
            }

            if (User::where('email', $data['email'])->exists()) {
                return response()->json(['error' => 'This email is already registered'], 400);
            }

            // -------------------- เตรียมข้อมูล --------------------
            unset($data['confirmPassword']); // ลบข้อมูล confirmPassword ออก

            $data['password'] = Hash::make($data['password']);
            $data['google_id'] = $data['google_id'] ?? null;
            $data['auth_provider'] = $data['auth_provider'] ?? 'local';

            // แปลง key name ให้ตรงกับ Database
            $mappedData = [
                'name' => strip_tags($data['name']),
                'last_name' => strip_tags($data['lastName']),
                'email' => strip_tags($data['email']),
                'password' => $data['password'],
                'dob' => $data['dob'],
                'gender' => $data['gender'],
                'google_id' => $data['google_id'],
                'auth_provider' => $data['auth_provider']
            ];

            // -------------------- บันทึกข้อมูล --------------------
            $user = User::create($mappedData);

            return response()->json(['user' => $user, 'success' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to insert data: ' . $e->getMessage()
            ], 500);
        }
    }
    public function deleteUser(Request $request, $id)
    {
        try {
            // ค้นหาผู้ใช้ตาม ID
            $user = User::find($id);

            // ถ้าไม่พบผู้ใช้ให้คืนค่า error
            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            // ลบผู้ใช้
            $user->delete();

            return response()->json(['success' => true, 'message' => 'User deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete user: ' . $e->getMessage()], 500);
        }
    }
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = DB::table('users')->where('email', $email)->first();




        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);;
        } else {
            // กำหนด payload เอง
            try {
                JWTFactory::customClaims([
                    'sub' => $user->id,
                    'email' => $user->email,
                ]);
                $payload = JWTFactory::make();
                $token = JWTAuth::encode($payload)->get();
                return response()->json([
                    'token' => $token,
                    'user' => [
                        'id' => $user->id,
                        'email' => $user->email
                    ]
                ]);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }
}
