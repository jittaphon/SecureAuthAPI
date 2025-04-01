<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก | KPI Health PHAYAO</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jwt-decode/build/jwt-decode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-treemap"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

    <style>
        body {
            font-family: 'Noto Sans Thai';
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-8 max-w-sm w-full">
        <h2 class="text-2xl font-bold text-center mb-6">สมัครสมาชิก</h2>
        <form id="registerForm">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">ชื่อเต็ม</label>
                <input type="text" id="name" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" placeholder="กรุณากรอกชื่อเต็ม">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">อีเมล</label>
                <input type="email" id="email" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" placeholder="กรุณากรอกอีเมล">
            </div>
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">ชื่อผู้ใช้งาน</label>
                <input type="text" id="username" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" placeholder="กรุณากรอกชื่อผู้ใช้งาน">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">รหัสผ่าน</label>
                <input type="password" id="password" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" placeholder="กรุณากรอกรหัสผ่าน">
            </div>
            <div class="mb-4">
                <label for="confirmPassword" class="block text-sm font-medium text-gray-700">ยืนยันรหัสผ่าน</label>
                <input type="password" id="confirmPassword" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" placeholder="กรุณายืนยันรหัสผ่าน">
            </div>
            <div class="mb-4 text-center">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none">
                    สมัครสมาชิก
                </button>
            </div>
        </form>
        <p class="text-center text-sm text-gray-500">มีบัญชีอยู่แล้ว? <a href="login.php" class="text-blue-500">เข้าสู่ระบบ</a></p>
    </div>

</body>

</html>