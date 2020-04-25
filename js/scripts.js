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
// var alertText = document.getElementById("alertText");
// document.addEventListener("keydown", function(e) {
//     if(e.target.tagName=="INPUT"){
//         alertText.style.display = "none";
//     }
// });

// function validateForm() {
//     var userid = document.getElementById("userid").value;
//     var password = document.getElementById("password").value;
//     if (userid == "admin" && password == "admin") {
//         return true;
//     }
//     else {
//         alertText.innerHTML = "Kiểm tra lại mã sinh viên hoặc mật khẩu";
//         alertText.style.display = "block";
//         return false;
//     }
// }

// Slideshow
var slideIndex = 1;
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

// Tabs Content
function openTab(event, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    event.currentTarget.className += " active";
}

// Calendar
function calendarDetails() {
    var calendar = new VanillaCalendar({
        selector: "#myCalendar",
        months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        shortWeekday: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        pastDates: false,
        onSelect: (data, elem) => {
            var daysConvert = "", monthsConvert = "";
            switch (data.date.toString().slice(0, 3)) {
                case "Sun":
                    daysConvert = "Chủ Nhật";
                    break;
                case "Mon":
                    daysConvert = "Thứ Hai";
                    break;
                case "Tue":
                    daysConvert = "Thứ Ba";
                    break;
                case "Wed":
                    daysConvert = "Thứ Tư";
                    break;
                case "Thu":
                    daysConvert = "Thứ Năm";
                    break;
                case "Fri":
                    daysConvert = "Thứ Sáu";
                    break;
                case "Sat":
                    daysConvert = "Thứ Bảy";
                    break;
            };

            switch (data.date.toString().slice(4, 7)) {
                case "Jan":
                    monthsConvert = "01";
                    break;
                case "Feb":
                    monthsConvert = "02";
                    break;
                case "Mar":
                    monthsConvert = "03";
                    break;
                case "Apr":
                    monthsConvert = "04";
                    break;
                case "May":
                    monthsConvert = "05";
                    break;
                case "Jun":
                    monthsConvert = "06";
                    break;
                case "Jul":
                    monthsConvert = "07";
                    break;
                case "Aug":
                    monthsConvert = "08";
                    break;
                case "Sep":
                    monthsConvert = "09";
                    break;
                case "Oct":
                    monthsConvert = "10";
                    break;
                case "Nov":
                    monthsConvert = "11";
                    break;
                case "Dec":
                    monthsConvert = "12";
                    break;
            };
            var daydetails = (daysConvert + " " + data.date.toString().slice(8, 10) + "/" + monthsConvert + "/" + data.date.toString().slice(11, 15));
            var setValue = localStorage.setItem("storageDays", daydetails);
            var getValue = localStorage.getItem("storageDays", daydetails);
            if (getValue.slice(0, -11) === "Thứ Bảy" || getValue.slice(0, -11) === "Chủ Nhật") {
                window.location = "regist-timetable-2.html";
            }
            else window.location = "regist-timetable-1.html";
        }
    });
}

var getValue = localStorage.getItem("storageDays");
function getTimes() {
    document.getElementById("timedetails").innerHTML = getValue;
}

// Go Back
function goBack() {
    window.history.back();
}

// Submit Regist
function regist() {
    var anchors = document.getElementsByClassName('button-regist');
    for(var i = 0; i < anchors.length; i++) {
        var anchor = anchors[i];
        anchor.onclick = function() {
            window.location = "regist-form.html";
        }
    }
}

// Edit Warning Text
document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Phần này không thể bỏ trống");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})

// Alert Confirm
function alertConfirm() {
    var verify = confirm("Xác nhận thoát khỏi trang");
    if (verify == true) {
        goBack();
    }
}

// Dropdown Menu
function dropdownMenu() {
    document.getElementById("dropdown").classList.toggle("show");
}
window.onclick = function(event) {
    if (!event.target.matches('.dropdown-button')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
}