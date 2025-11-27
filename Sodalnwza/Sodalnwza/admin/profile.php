<?php
session_start();
// ตรวจสอบการล็อกอิน
if (!isset($_SESSION['mem_id'])) { 
    echo "<script>alert('กรุณาล็อกอินก่อนครับ'); window.location='login.php';</script>";
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Management</title>
    <!-- เรียกใช้ Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ฟอนต์ Sarabun เพื่อความสวยงาม -->
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f8f9fa; }
    </style>
</head>
<body>

    <!-- Navbar สีดำ (ธีมเดิม) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">MyWebApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
          </ul>
          
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
             <li class="nav-item">
                <span class="nav-link text-white">
                    สวัสดี, <strong><?php echo htmlspecialchars($_SESSION['fullname']); ?></strong>
                </span>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-danger btn-sm ms-2" href="../logout.php">ออกจากระบบ</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Member Management</h2>
        <a href="add_member.php" class="btn btn-success">เพิ่มสมาชิกใหม่</a>
      </div>
      
      <!-- ตารางแบบมีเส้นขอบ (ธีมเดิม) -->
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Member_ID</th>
            <th>Username</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Position</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // 1. เชื่อมต่อฐานข้อมูล
          require_once '../connect.php'; 

          // 2. คำสั่ง SQL: ดึงข้อมูลจากตาราง member
          $sql = "SELECT * FROM member"; 
          
          // ตรวจสอบตัวแปรเชื่อมต่อ (รองรับทั้ง $con และ $conn)
          $db = isset($con) ? $con : (isset($conn) ? $conn : null);

          if ($db) {
              // เลือกวิธี query ตามชนิดตัวแปร
              if ($db instanceof mysqli) {
                  $result = $db->query($sql);
              } else {
                  $result = mysqli_query($db, $sql);
              }

              if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['mem_id'] . "</td>";
                  echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                  
                  // แสดง Fullname
                  echo "<td>" . htmlspecialchars($row['fullname']) . "</td>";
                  
                  echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                  
                  // แสดง Position
                  $pos = !empty($row['position']) ? $row['position'] : '-';
                  echo "<td>" . htmlspecialchars($pos) . "</td>";
                  
                  echo "<td>
                    <a href='edit_member.php?id=" . $row['mem_id'] . "' class='btn btn-warning btn-sm'>แก้ไข</a>
                    <a href='delete_member.php?id=" . $row['mem_id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('คุณต้องการลบสมาชิกนี้หรือไม่?');\">ลบ</a>
                  </td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='6' class='text-center'>ไม่มีข้อมูลสมาชิก</td></tr>";
              }
          } else {
              echo "<tr><td colspan='6' class='text-center text-danger'>เชื่อมต่อฐานข้อมูลไม่สำเร็จ (ตรวจสอบไฟล์ connect.php)</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>