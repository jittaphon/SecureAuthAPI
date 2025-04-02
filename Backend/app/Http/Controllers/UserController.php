<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

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
            if ($data['password'] !== $data['confirmPassword']) {
                return response()->json(['error' => 'Passwords do not match'], 400);
            }

            if (User::where('email', $data['email'])->exists()) {
                return response()->json(['error' => 'This email is already registered'], 400);
            }

            // -------------------- เตรียมข้อมูล --------------------
            unset($data['confirmPassword']); // ลบข้อมูล confirmPassword ออก

            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT); // เข้ารหัสรหัสผ่าน
            $data['google_id'] = $data['google_id'] ?? null; // ถ้าไม่มีให้เป็น null
            $data['auth_provider'] = $data['auth_provider'] ?? 'local'; // ค่าเริ่มต้นคือ 'local'

            // แปลง key name ให้ตรงกับ Database
            $mappedData = [
                'name' => $data['name'],
                'last_name' => $data['lastName'],  // lastName -> last_name
                'email' => $data['email'],
                'password' => $data['password'],  // เข้ารหัสครั้งเดียว
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
}
