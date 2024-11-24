<?php
session_start();
include('admin/includes/config.php');

if (isset($_POST['login'])) {
  $uname = $_POST['username'];
  $Password = md5($_POST['inputpwd']);
  $query = mysqli_query($con, "select ID,AdminuserName,UserType from tbladmin where  AdminuserName='$uname' && Password='$Password'");
  $ret = mysqli_fetch_array($query);
  if ($ret > 0) {
    $_SESSION['aid'] = $ret['ID'];
    $_SESSION['uname'] = $ret['AdminuserName'];
    $_SESSION['utype'] = $ret['UserType'];
    header('location:dashboard.php');
  } else {
    echo "<script>alert('Invalid Details.');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Kuber Restaurant Admin Login</title>
  <!-- Meta tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background-image: url('../images/bg1.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
  </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
      <!-- Left Column: Booking Form -->
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

      <!-- Right Column: Admin Login Form -->
      <div class="p-8 rounded shadow-lg" style="background-color: rgba(255, 255, 255, 0.9); border: 1px solid #A92C2C;">
        <h2 class="text-3xl font-bold mb-6 text-center" style="color: #A92C2C;">Admin Login</h2>
        <form method="post" class="space-y-6">
          <!-- Username -->
          <div>
            <input type="text" name="username" placeholder="Username" required
              class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500"
              style="border-color: #A92C2C;">
          </div>
          <!-- Password -->
          <div>
            <input type="password" name="inputpwd" placeholder="Password" required
              class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500"
              style="border-color: #A92C2C;">
          </div>
          <!-- Submit Button -->
          <button type="submit" name="login"
            class="w-full py-3 rounded text-white hover:opacity-90 transition-all duration-300"
            style="background-color: #A92C2C;">
            Sign In
          </button>
          <!-- Links -->
          <div class="text-center" style="color: #A92C2C;">
            <p>
              <a href="password-recovery.php" class="underline">Forgot Password?</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>