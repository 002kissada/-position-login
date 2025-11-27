<?php
// 1. session_start() (ถูกต้อง) [cite: 33]
session_start();

// 2. Include (ใช้ $con ตามเอกสาร)
include 'connect.php'; 

// 3. รับค่าให้ถูกต้อง (รับ username) 
$username = $_POST['username']; // แก้จาก email
$password = $_POST["password"]; 

// 4. แก้ไข SQL ให้ตรงตามเอกสาร 
$sql = "SELECT * FROM member WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql); // แก้ $conn เป็น $con

// 5. แก้ไข Bind Param 
mysqli_stmt_bind_param($stmt, "s", $username); // แก้ $email เป็น $username
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// 6. แก้ไขการตรวจสอบ 
if ($row = mysqli_fetch_assoc($result)) {
    // -- พบผู้ใช้ (ด้วย username) --
    
    if (password_verify($password, $row['password'])) { // 
        // ** รหัสผ่านถูกต้อง!! **
        
        // 7. แก้ไข Session ให้ตรงตามเอกสาร 
        $_SESSION['mem_id'] = $row['mem_id']; 
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['position'] = $row['position'];

        if($row['position'] == 'admin'){
            echo "<script>
            window.location='admin/profile.php';
            </script>";
        } elseif ($row['position'] == 'user'){
            echo "<script>
            window.location='profile.php';
            </script>";
        }
        exit();
        // 8. ส่งผู้ใช้ไปหน้า profile (ถูกต้อง)
        header('Location: profile.php');
        exit();

    } else {
        // รหัสผ่านผิด (ถูกต้อง)
        echo "<script>alert('รหัสผ่านไม่ถูกต้อง'); window.history.back();</script>";
        exit();
    }

} else {
    // ไม่พบผู้ใช้
    // แก้ไข Alert ให้ตรงกับความเป็นจริง (ไม่พบ Username)
    echo "<script>alert('ไม่พบ Username นี้ในระบบ'); window.history.back();</script>";
    exit();
}
?>