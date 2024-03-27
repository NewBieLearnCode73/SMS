// VALIDATION FOR LOGIN FORM
$(document).ready(function () {
    // Hàm hỗ trợ hiển thị thông báo lỗi khi validate form
    function displayError(element, message) {
        // Tìm kiếm phần tử '.error' ở cấp độ cao hơn
        var errorElement = element.parent().next(".error");
        errorElement.text(message);
    }

    // Validate the login form
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

    $(".form-login").on("submit", function (event) {
        // Ngăn chặn hành vi mặc định của form (gửi form)
        event.preventDefault();

        // Kiểm tra form
        if (validateLoginForm()) {
            // Nếu form hợp lệ, gửi form
            this.submit();
        }
    });

    // Validate the admin account form
    function validateAdminAccountForm() {
        var password = $(".form-admin-account__input--password");
        var repassword = $(".form-admin-account__input--repassword");

        // Reset error messages
        $(".error").text("");

        // Validate password
        if (password.val().trim() === "") {
            displayError(password, "Password is not empty");
            return false;
        }

        if (password.val().trim().length < 8) {
            displayError(password, "Password must be at least 8 characters");
            return false;
        }

        if (password.val().trim().length > 20) {
            displayError(password, "Password must be at most 20 characters");
            return false;
        }

        // Password is not fit
        var passwordRegex = /^(?=.*[A-Z])(?=.*[a-z]).{8,20}$/; // Ít nhất một chữ cái hoa, một chữ cái thường, độ dài từ 8 đến 20 ký tự
        if (!passwordRegex.test(password.val())) {
            displayError(password, "Password is not fit");
            return false;
        }

        // Validate repassword
        if (repassword.val().trim() === "") {
            displayError(repassword, "Repassword is not empty");
            return false;
        }

        if (repassword.val().trim() !== password.val().trim()) {
            displayError(repassword, "Repassword is not match");
            return false;
        }

        return true;
    }

    $(".form-admin-account").on("submit", function (event) {
        event.preventDefault();

        if (validateAdminAccountForm()) {
            // Show thông báo thay đổi mật khẩu thành công
            alert("Change password successfully");
            this.submit();
        }
    });

    // Validate student account form
    function validateAdminStudentAccountForm() {
        var username = $(".form-manage-student-account__input--username");
        var password = $(".form-manage-student-account__input--password");

        // Reset error messages
        $(".error").text("");

        // Validate username
        if (username.val().trim() === "") {
            displayError(username, "Username is not empty");
            return false;
        }

        // Validate username regex
        var usernameRegex = /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d_]{8,20}$/;
        if (!usernameRegex.test(username.val())) {
            displayError(username, "Username is not fit");
            return false;
        }

        // Validate username length
        if (username.val().trim().length < 8) {
            displayError(username, "Username must be at least 8 characters");
            return false;
        }

        if (username.val().trim().length > 20) {
            displayError(username, "Username must be at most 20 characters");
            return false;
        }

        // Validate password
        if (password.val().trim() === "") {
            displayError(password, "Password is not empty");
            return false;
        }

        // Validate password length
        if (password.val().trim().length < 8) {
            displayError(password, "Password must be at least 8 characters");
            return false;
        }

        if (password.val().trim().length > 20) {
            displayError(password, "Password must be at most 20 characters");
            return false;
        }

        // Validate password regex
        var passwordRegex = /^(?=.*[A-Z])(?=.*[a-z]).{8,20}$/;
        if (!passwordRegex.test(password.val())) {
            displayError(password, "Password is not fit");
            return false;
        }

        return true;
    }

    $(".form-manage-student-account").on("submit", function (event) {
        event.preventDefault();

        if (validateAdminStudentAccountForm()) {
            this.submit();
        }
    });

    // Validate the student account form
    function validateStudentAccountForm() {
        var password = $(".form-student-account__input--password");
        var repassword = $(".form-student-account__input--repassword");

        // Reset error messages
        $(".error").text("");

        // Validate password
        if (!password.val() || password.val().trim() === "") {
            displayError(password, "Password is not empty");
            return false;
        }

        if (password.val().trim().length < 8) {
            displayError(password, "Password must be at least 8 characters");
            return false;
        }

        if (password.val().trim().length > 20) {
            displayError(password, "Password must be at most 20 characters");
            return false;
        }

        // Validate repassword
        if (!repassword.val() || repassword.val().trim() === "") {
            displayError(repassword, "Repassword is not empty");
            return false;
        }

        if (repassword.val().trim() !== password.val().trim()) {
            displayError(repassword, "Repassword is not match");
            return false;
        }

        // Password is not fit
        var passwordRegex = /^(?=.*[A-Z])(?=.*[a-z]).{8,20}$/; // Ít nhất một chữ cái hoa, một chữ cái thường, độ dài từ 8 đến 20 ký tự
        if (!passwordRegex.test(password.val())) {
            displayError(password, "Password is not fit");
            return false;
        }

        return true;
    }

    $(".form-student-account").on("submit", function (event) {
        event.preventDefault();

        if (validateStudentAccountForm()) {
            // Show thông báo thay đổi mật khẩu thành công
            alert("Change password successfully");
            this.submit();
        }
    });
});
