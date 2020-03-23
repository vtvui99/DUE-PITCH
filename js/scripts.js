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
        return true;
    }

    else {
        alert("Kiểm tra lại mã sinh viên hoặc mật khẩu");
        return false;
    }
} 

// Slideshow
var slideIndex = 1;
showSlides(slideIndex);

function prevSlide(n) {
    showSlides(slideIndex += n);
}

function nextSlide(n) {
    showSlides(slideIndex -= n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("my-slides");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex-1].style.display = "block";
}