<?php
// اطمینان حاصل کنید که فرم ارسال شده است
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت ایمیل از فرم
    $email = $_POST["email"];
    
    // فراخوانی متد checkEmail از کلاس LoginController
    include 'LoginController.php';
    $loginController = new LoginController();
    $loginController->checkEmail($email);
}
?>


<?php
class LoginController {
    public function checkEmail($email) {
        // انجام بررسی ایمیل
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // ایمیل معتبر است، ادامه فرآیند لاگین را انجام دهید
            header("Location: dashboard.php"); // به عنوان مثال
            exit();
        } else {
            // ایمیل نامعتبر است، نمایش پیغام خطا به کاربر
            echo "ایمیل وارد شده معتبر نیست.";
        }
    }
}
?>