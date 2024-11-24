<?php
// Include the database connection file
include_once('admin/includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kuber Restaurant</title>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center" style="background-image: url('images/bg1.jpg'); background-size: cover; background-position: center;">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Left Column -->
            <div class="p-8 rounded shadow-lg" style="background-color: rgba(255, 255, 255, 0.9); border: 1px solid #A92C2C;">
                <h1 class="text-5xl font-bold" style="color: #A92C2C;">Kuber Restaurant</h1>
                <div class="left-text my-2">
                    <p class="text-lg" style="color: #A92C2C;">
                        Experience exquisite dining with our delicious menu and exceptional service.
                    </p>
                </div>
                <div class="explore-menu-btn mt-5">
                    <a href="menu.php" 
                    class="px-6 py-3 rounded text-white hover:opacity-90 transition-all duration-300"
                    style="background-color: #A92C2C;">
                        Explore Menu
                    </a>
                </div>
            </div>

            <!-- Right Column -->
            <div class="p-8 rounded shadow-lg animate-fade-in" style="background-color: rgba(255, 255, 255, 0.9); border: 1px solid #A92C2C;">
                <!-- Success and Error Messages -->
                <?php if (isset($_GET['success'])): ?>
                    <div class="p-4 rounded shadow mb-4 text-white" style="background-color: #A92C2C;">
                        Booking successful! Your booking number is: <?php echo $_GET['bookingNo']; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['error'])): ?>
                    <div class="p-4 rounded shadow mb-4 text-white" style="background-color: #A92C2C;">
                        Something went wrong, please try again.
                    </div>
                <?php endif; ?>

                <!-- Booking Form -->
                <h2 class="text-3xl font-bold mb-6 text-center" style="color: #A92C2C;">Reserve The Table Now</h2>
                <form id="bookingForm" class="space-y-6">
                    <!-- Name and Email -->
                    <div class="space-y-4">
                        <input type="text" name="name" placeholder="Name" required
                            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                            style="border-color: #A92C2C;">
                        <input type="email" name="email" placeholder="Email" required
                            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                            style="border-color: #A92C2C;">
                    </div>

                    <!-- Phone Number -->
                    <input type="text" name="phonenumber" placeholder="Phone Number" required
                        class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                        style="border-color: #A92C2C;">

                    <!-- Booking Date and Time -->
                    <div class="space-y-4">
                        <input type="date" name="bookingdate" required
                            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                            style="border-color: #A92C2C;">
                        <input type="time" name="bookingtime" required
                            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                            style="border-color: #A92C2C;">
                    </div>

                    <!-- Number of Adults and Children -->
                    <div class="grid grid-cols-2 gap-4">
                        <select name="noadults" required
                            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                            style="border-color: #A92C2C;">
                            <option value="">Adults</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                        <select name="nochildrens" required
                            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                            style="border-color: #A92C2C;">
                            <option value="">Children</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" name="submit"
                        class="w-full py-3 rounded text-white hover:opacity-90 transition-all duration-300"
                        style="background-color: #A92C2C;">
                        Reserve a Table
                    </button>

                    <!-- Links -->
                    <div class="text-center space-y-2" style="color: #A92C2C;">
                        <p>Check Booking <a href="check-status.php" target="_blank" class="underline">Status</a></p>
                        <p>Admin Panel <a href="admin/" target="_blank" class="underline">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.5s ease-out;
        }
    </style>

    <script>
        document.getElementById('bookingForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);
            const jsonData = {};

            formData.forEach((value, key) => {
                jsonData[key] = value;
            });

            fetch('addbooking.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(jsonData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = 'index.php?success=true&bookingNo=' + data.bookingNo;
                } else {
                    window.location.href = 'index.php?error=true';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                window.location.href = 'index.php?error=true';
            });
        });
    </script>
</body>

</html>