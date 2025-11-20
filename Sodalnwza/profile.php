<?php
// 1. session_start() (ถูกต้อง) [cite: 46]
session_start();

// 2. แก้ไขการตรวจสอบสิทธิ์ 
if (!isset($_SESSION['mem_id'])) { // แก้ mem_id เป็น cus_id
    
    echo "<h1>Access Denied</h1>";
    echo "กรุณาล็อกอินก่อนครับ";
    // 3. แก้ไขลิงก์กลับ 
    echo "<br><a href='login.php'>ไปหน้าล็อกอิน</a>"; // แก้เป็น login.html
    exit(); 
}

// 4. แสดงผล (ถูกต้อง) 
//echo "<h1>สวัสดีคุณ, " . htmlspecialchars($_SESSION['fullname']) . "</h1>";
//echo "<p>นี่คือหน้าโปรไฟล์ส่วนตัวของคุณ</p>";
// 5. แก้ไขการแสดงผล 
//echo "<p>username ของคุณ: " . htmlspecialchars($_SESSION['username']) . "</p>"; // แก้ Email เป็น Username
//echo "<hr>";    
//echo "<a href='logout.php'>ออกจากระบบ (Logout)</a>";
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - <?php echo $fullname; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    </head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="profile.php">MyWebApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
            </li>
            </ul>
          
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <span class="nav-link text-white">
                สวัสดี, <strong><?php echo ($_SESSION['fullname']); ?></strong>
              </span>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger" href="logout.php">ออกจากระบบ</a>
            </li>
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>ข้อมูลส่วนตัว</h2>
            </div>
            <div class="card-body">
                <h1>สวัสดีคุณ, <?php echo ($_SESSION['fullname']); ?></h1>
                <p>นี่คือหน้าโปรไฟล์ส่วนตัวของคุณ</p>
                <hr>
                <p><strong>Username ของคุณ:</strong> <?php echo ($_SESSION['username']); ?></p>
                <p><strong>รหัสสมาชิก (id):</strong> <?php echo  ($_SESSION['mem_id']); ?></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>