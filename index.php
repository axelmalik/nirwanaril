<?php 

session_start(); 

if (!isset($_SESSION['nama_admin'])) { 

 header("Location: login.php"); 

} 

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nirwana</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js">
    
</head>
<body class="bg-gray-300">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-green-600 text-white flex flex-col rounded-r-2xl shadow-lg">
            <div class="text-center text-xl font-bold border-b border-black bg-[#465911] text-white h-52 rounded-b-2xl flex flex-col items-center justify-center">
                <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center text-black text-2xl font-bold">
                    <!-- Avatar content here -->
                </div>
                <div class="mt-2 text-white text-lg font-semibold"><?php echo $_SESSION['nama_admin'];?></span>
                </div> 
                <div class="mt-1 text-white text-sm font-semibold"><?php echo $_SESSION['nip_admin'];?></div> 
            </div>
            <nav class="flex-1 p-10">
                <a href="index.php" class="block py-4 px-5 rounded hover:bg-gray-700 flex items-center text-lg mb-2">
                    <i class="fa-solid fa-border-all fa-lg mr-4 text-yellow-300"></i>
                    Dashboard
                </a>
                <a href="dokter.php" class="block py-4 px-5 rounded hover:bg-gray-700 flex items-center text-lg mb-2">
                    <i class="fas fa-user-md fa-lg mr-4 text-yellow-300"></i>
                    Dokter
                </a>
                <a href="#" class="block py-4 px-5 rounded hover:bg-gray-700 flex items-center text-lg mb-2">
                    <i class="fa-regular fa-calendar fa-lg mr-4 text-yellow-300"></i>                    
                    Jadwal
                </a>
                <a href="#" class="block py-4 px-5 rounded hover:bg-gray-700 flex items-center text-lg mb-2">
                    <i class="fa-solid fa-chart-column fa-lg mr-4 text-yellow-300"></i>
                    Laporan
                </a>
                </a>
                <a href="auth/logout.php" class="block py-4 px-5 rounded hover:bg-gray-700 flex items-center text-lg mb-2">
                    <i class="fa-solid fa-solid fa-right-from-bracket fa-lg mr-4 text-yellow-300"></i>
                    Logout
                </a>
            </nav>            
        </div>
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <div class="bg-white text-black p-1 flex justify-between items-center shadow-md w-full h-16">
                <div class="flex-grow"></div>
                <img src="img/logo-nirwana.png" alt="Logo" class="h-32 w-auto" />
            </div>
            <div class="p-10 mt-11">
            <span class="font-bold text-4xl">Welcome, <?php echo $_SESSION['nama_admin']; ?></span>
                <p class="text-gray-400 text-xl mt-1">Hospital Admin Dashboard</p>

                <div class="flex gap-10 mt-10">
                    <!-- Pasien -->
                    <div class="relative p-10 bg-white border border-gray-300 rounded-lg w-full md:w-3/4 lg:w-1/2">
                        <div class="w-20 h-20 bg-green-500 rounded-lg absolute top-0 right-0 flex items-center justify-center">
                            <i class="fa-solid fa-notes-medical fa-3x text-white"></i>
                        </div>
                        <div class="absolute top-0 left-8 p-1 flex flex-col items-center justify-center h-full">
                            <p class="text-gray-800 font-semibold">Pasien</p>
                            <p class="text-black font-bold text-2xl mt-2">60</p>
                        </div>
                    </div>
                    
                    <!-- Dokter -->
                    <div class="relative p-10 bg-white border border-gray-300 rounded-lg w-full md:w-3/4 lg:w-1/2">
                        <div class="w-20 h-20 bg-green-500 rounded-lg absolute top-0 right-0 flex items-center justify-center">
                            <i class="fa-solid fa-stethoscope fa-3x text-white"></i>
                        </div>
                        <div class="absolute top-0 left-8 p-1 flex flex-col items-center justify-center h-full">
                            <p class="text-gray-800 font-semibold">Dokter</p>
                            <p class="text-black font-bold text-2xl mt-2">30</p>
                        </div>
                    </div>
                    
                    <!-- Karyawan -->
                    <div class="relative p-10 bg-white border border-gray-300 rounded-lg w-full md:w-3/4 lg:w-1/2">
                        <div class="w-20 h-20 bg-green-500 rounded-lg absolute top-0 right-0 flex items-center justify-center">
                            <i class="fa-solid fa-user fa-3x text-white"></i>
                        </div>
                        <div class="absolute top-0 left-3 p-1 flex flex-col items-center justify-center h-full">
                            <p class="text-gray-800 font-semibold">Karyawan</p>
                            <p class="text-black font-bold text-2xl mt-2">20</p>
                        </div>
                    </div>
                </div>

                <div class="flex mt-10 bg-white p-5 rounded-lg shadow-md gap-10">
        <canvas id="monthlyChart" width="400" height="100"></canvas>
    </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<script>
    const ctx = document.getElementById('monthlyChart').getContext('2d');
    const monthlyChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Monthly Data',
                data: [30, 20, 50, 40, 60, 70, 30, 90, 50, 80, 100, 60], // Replace with your data
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

 
</body>
</html>
