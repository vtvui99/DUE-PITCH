// Show Password
function showYourPassword() {
    var showPassword = document.getElementById("password");
    if (showPassword.type === "password") {
        showPassword.type = "text";
    } else {
        showPassword.type = "password";
    }
}

// Validate Form
// Dùng để kiểm tra tên đăng nhập và mật khẩu có trùng với hệ thống không. Nhưng mà hiện tại chỉ đang để mặc định là admin. Về sau
// đưa dữ liệu thật vào để kiểm tra thì sẽ thay đổi sau.
function validateForm() {
    var userid = document.getElementById("userid").value;
    var password = document.getElementById("password").value;

    if (userid == "admin" || password == "admin") {
        alert("Đăng nhập thành công");
        return true;
    }

    else {
        alert("Kiểm tra lại mã sinh viên hoặc mật khẩu");
        return false;
    }
} 