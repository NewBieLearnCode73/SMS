// VALIDATION FOR LOGIN FORM
$(document).ready(function () {
    function displayError(element, message) {
        // Tìm kiếm phần tử '.error' ở cấp độ cao hơn
        var errorElement = element.parent().next(".error");
        errorElement.text(message);
    }

    // Function to validate the login form
    function validateLoginForm() {
        var username = $(".form-login__input--username");
        var password = $(".form-login__input--password");

        // Reset error messages
        $(".error").text("");

        // Validate username
        if (username.val().trim() === "") {
            displayError(username, "Username is not empty");
            return false;
        }

        // Validate password
        if (password.val().trim() === "") {
            displayError(password, "Password is not empty");
            return false;
        }

        // Validation other condition for username
        var usernameRegex = /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d_]{8,20}$/;
        if (!usernameRegex.test(username.val())) {
            displayError(username, "Username is incorrect");
            return false;
        }

        // Validation other condition for password
        var passwordRegex = /^(?=.*[A-Z])(?=.*[a-z]).{8,20}$/; // Ít nhất một chữ cái hoa, một chữ cái thường, độ dài từ 8 đến 20 ký tự
        if (!passwordRegex.test(password.val())) {
            displayError(password, "Password is incorrect");
            return false;
        }

        return true;
    }

    // File: public/js/main.js

    $(".form-login").on("submit", function (event) {
        // Ngăn chặn hành vi mặc định của form (gửi form)
        event.preventDefault();

        // Kiểm tra form
        if (validateLoginForm()) {
            // Nếu form hợp lệ, gửi form
            this.submit();
        }
    });
});
