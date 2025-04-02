<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KPI Health PHAYAO</title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
        <h2 class="text-2xl font-bold text-center mb-6">เข้าสู่ระบบ</h2>
        <form id="loginForm">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">ชื่อผู้ใช้งาน</label>
                <input type="text" id="username" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" placeholder="กรุณากรอกชื่อผู้ใช้งาน">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">รหัสผ่าน</label>
                <input type="password" id="password" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" placeholder="กรุณากรอกรหัสผ่าน">
            </div>
            <div class="mb-4 text-center">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none">
                    เข้าสู่ระบบ
                </button>
            </div>

        </form>


        <p class="text-center text-sm text-gray-500">ยังไม่มีบัญชี? <a href="register.php" class="text-blue-500">สมัครสมาชิก</a></p>

        <div class="flex items-center justify-center w-full">
            <hr class="w-full h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <span class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white dark:text-white dark:bg-gray-900">or</span>
        </div>



        <div class="flex items-center justify-center ">
            <button class="flex items-center bg-white dark:bg-gray-900 border border-gray-300 rounded-lg shadow-md px-6 py-2 text-sm font-medium text-gray-800 dark:text-white hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px" viewBox="-0.5 0 48 48" version="1.1">
                    <title>Google-color</title>
                    <desc>Created with Sketch.</desc>
                    <defs> </defs>
                    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Color-" transform="translate(-401.000000, -860.000000)">
                            <g id="Google" transform="translate(401.000000, 860.000000)">
                                <path d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24" id="Fill-1" fill="#FBBC05"> </path>
                                <path d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333" id="Fill-2" fill="#EB4335"> </path>
                                <path d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667" id="Fill-3" fill="#34A853"> </path>
                                <path d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24" id="Fill-4" fill="#4285F4"> </path>
                            </g>
                        </g>
                    </g>
                </svg>
                <span>Continue with Google</span>
            </button>
        </div>
    </div>

</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // สร้างแอนิเมชันให้กับฟอร์มล็อกอิน
        gsap.from(".bg-white", {
            opacity: 0,
            y: -50,
            duration: 1,
            ease: "power3.out"
        });

        // สร้างแอนิเมชันให้กับปุ่มล็อกอิน
        gsap.from("button[type='submit']", {
            opacity: 0,
            x: -50,
            duration: 1,
            delay: 0.5,
            ease: "power3.out"
        });
    });
</script>

</html>