<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class HosController extends BaseController
{
    // ดึงข้อมูลจากฐานข้อมูลแล้วแจ้งเตือนผ่าน LINE
    public function getHospitalData()
    {
        try {


            // ดึงข้อมูลทั้งหมดจาก tb_hospital
            $hospitals = DB::table('tb_hospital')->get();

            if ($hospitals->isEmpty()) {
                return response()->json(['status' => 'No data found']);
            }

            // สร้างข้อความแจ้งเตือน
            $message = "📢 รายชื่อโรงพยาบาลล่าสุด:\n";
            foreach ($hospitals as $hospital) {
                $message .= "🏥 " . $hospital->hospital_name . " | Beds: " . $hospital->number_of_beds . " | People: " . $hospital->number_of_people . "\n\n";  // เพิ่มบรรทัดว่างระหว่างรายการ
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Notification sent!',
                'data' => $hospitals
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch data: ' . $e->getMessage()
            ], 500);
        }
    }
    // ฟังก์ชันส่ง LINE Message

}
