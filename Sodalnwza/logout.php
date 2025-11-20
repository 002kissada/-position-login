<?php
// 1. ต้องวาง session_start(); ไว้ บรรทัดบนสุดเสมอ
session_start();

// 2. ทำลาย Session ทั้งหมด
session_unset();  // ล้างค่าตัวแปร Session ทั้งหมด
session_destroy(); // ทำลาย Session ID ที่เก็บไว้

// 3. ส่งกลับไปหน้าล็อกอิน
header('Location: login.php');
exit(); // จบการทำงานทันที
?>