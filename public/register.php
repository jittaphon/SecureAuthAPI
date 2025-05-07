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

    <div class="bg-white shadow-lg rounded-lg p-10 max-w-64 ">
        <h2 class="text-2xl font-bold text-center mb-6">สมัครสมาชิก</h2>
        <form id="registerForm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- ชื่อเต็ม -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 ">ชื่อเต็ม</label>
                    <input type="text" id="name" name="name" class="w-full mt-1 p-2 border border-gray-300 rounded-lg  " placeholder="ชื่อเต็ม" required>
                    <p id="nameError" class="text-red-500 text-sm hidden ">กรุณากรอกชื่อเต็ม</p> <!-- ข้อความแสดงเมื่อกรอกผิด -->
                </div>

                <!-- นามสกุล -->
                <div class="mb-4">
                    <label for="lastName" class="block text-sm font-medium text-gray-700">นามสกุล</label>
                    <input type="text" id="lastName" name="lastName" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" placeholder="นามสกุล" required>
                    <p id="lastNameError" class="text-red-500 text-sm hidden ">กรุณากรอกนามสกุล</p> <!-- ข้อความแสดงเมื่อกรอกผิด -->
                </div>


                <!-- เพศ -->
                <div class="mb-4">
                    <label for="gender" class="block text-sm font-medium text-gray-700">เพศ</label>
                    <select id="gender" name="gender" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                        <option value="">เลือกเพศ</option>
                        <option value="male">ชาย</option>
                        <option value="female">หญิง</option>
                        <option value="other">อื่นๆ</option>
                    </select>
                </div>

                <!-- วันเดือนปีเกิด -->
                <div class="mb-4">
                    <label for="dob" class="block text-sm font-medium text-gray-700">วันเดือนปีเกิด</label>
                    <input type="date" id="dob" name="dob" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                </div>


                <!-- อีเมล -->
                <div class="mb-4 col-span-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">อีเมล</label>
                    <input type="email" id="email" name="email" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" placeholder="กรุณากรอกอีเมล" required>
                    <p id="emailError" class="text-red-500 text-sm hidden rounded-lg">กรุณากรอก email</p> <!-- ข้อความแสดงเมื่อกรอกผิด -->
                </div>

                <!-- รหัสผ่าน -->
                <div class="mb-4 col-span-2">
                    <label for="password" class="block text-sm font-medium text-gray-700">รหัสผ่าน</label>
                    <input type="password" id="password" name="password" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" placeholder="กรุณากรอกรหัสผ่าน" required>
                    <p id="passwordError" class="text-red-500 text-sm hidden rounded-lg">กรุณากรอกรหัสผ่าน</p> <!-- ข้อความแสดงเมื่อกรอกผิด -->
                    <div class="mt-4">
                        <div id="password-strength-meter" class="w-full h-1 bg-gray-200 rounded-md">
                            <div id="strength-bar" class="h-full rounded-md"></div>
                        </div>
                        <p id="password-strength-text" class="mt-2 text-gray-600"></p>
                    </div>
                </div>

                <!-- ยืนยันรหัสผ่าน -->
                <div class="mb-4 col-span-2">
                    <label for="confirmPassword" class="block text-sm font-medium text-gray-700">ยืนยันรหัสผ่าน</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="w-full mt-1 p-2 border border-gray-300 rounded-lg " placeholder="กรุณายืนยันรหัสผ่าน" required>
                    <p id="passwordErrorCF" class="text-red-500 text-sm hidden rounded-lg">กรุณากรอกรหัสผ่าน</p> <!-- ข้อความแสดงเมื่อกรอกผิด -->
                </div>

                <!-- ปุ่มส่งฟอร์ม -->
                <div class="mb-4 text-center col-span-2">
                    <button type="submit" id="submitBtn"
                        class=" w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none ">
                        ยืนยันการสมัครสมาชิก
                    </button>
                </div>
            </div>
        </form>
        <p class=" text-center text-sm text-gray-500">มีบัญชีอยู่แล้ว? <a href="login.php" class="text-blue-500">เข้าสู่ระบบ</a></p>
    </div>

</body>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const form = document.getElementById("registerForm");
        const passwordInput = document.getElementById("password");
        const confirmPasswordInput = document.getElementById("confirmPassword");
        const submitBtn = document.getElementById("submitBtn");

        // ตรวจสอบรหัสผ่านให้ปลอดภัยขึ้น
        function checkPasswordStrength(password) {
            const strengthMeter = document.getElementById('strength-bar');
            const strengthText = document.getElementById('password-strength-text');

            const checks = [
                /.{8,}/, // อย่างน้อย 8 ตัวอักษร
                /\d/, // มีตัวเลข
                /[a-z]/, // ตัวพิมพ์เล็ก
                /[A-Z]/, // ตัวพิมพ์ใหญ่
                /[!@#$%^&*(),.?":{}|<>]/ // อักขระพิเศษ
            ];

            let strength = checks.reduce((acc, regex) => acc + regex.test(password), 0);
            let strengthLevels = ["อ่อนมาก", "อ่อน", "ปานกลาง", "ดี", "ดีมาก"];
            let colors = ["red-500", "orange-500", "yellow-500", "blue-500", "green-500"];

            strengthMeter.style.width = `${strength * 20}%`;
            strengthMeter.className = `h-full bg-${colors[strength]} rounded-md`;
            strengthText.textContent = strengthLevels[strength];
        }

        passwordInput.addEventListener('input', (e) => checkPasswordStrength(e.target.value));

        // ตรวจสอบรหัสผ่านตรงกัน
        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            const passwordErrorCF = document.getElementById('passwordErrorCF');

            if (confirmPassword === '') {
                passwordErrorCF.classList.add('hidden');
                return;
            }

            if (password !== confirmPassword) {
                passwordErrorCF.textContent = "รหัสผ่านไม่ตรงกัน";
                passwordErrorCF.classList.remove('hidden');
            } else {
                passwordErrorCF.classList.add('hidden');
            }
        }

        passwordInput.addEventListener('input', checkPasswordMatch);
        confirmPasswordInput.addEventListener('input', checkPasswordMatch);

        // ส่งฟอร์มแบบ async
        form.addEventListener("submit", async (event) => {
            event.preventDefault();
            submitBtn.disabled = true;
            submitBtn.textContent = "กำลังสมัคร...";
            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());
            try {
                console.log(data);
                axios.get('http://localhost:8000/api/get-users', data).then(function(response) {
                    console.log(response.data);
                })
            } catch (error) {
                Swal.fire("ผิดพลาด!", "เกิดข้อผิดพลาดในการสมัคร", "error");
                submitBtn.disabled = false;
                submitBtn.textContent = "ยืนยันการสมัครสมาชิก";
            }
        });
    });
</script>



</html>