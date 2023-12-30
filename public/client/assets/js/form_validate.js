$.validator.setDefaults({
    submitHandler: function () {
        document.querySelector('#form').submit();
    }
});
$(document).ready(function () {
    $("#form").validate({
        rules: {
            firstname: "required",
            lastname: "required",
            fullname: "required",
            username: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true
            },
            address: "required",
            phone: "required",
        },
        messages: {
            firstname: "Please enter a firstname",
            lastname: "Please enter a lastname",
            fullname: "Please enter a fullname",
            username: {
                required: "Please enter a username",
                minlength: "Username must have at least 2 characters"
            },
            password: {
                required: "Please enter a password",
                minlength: "Password must have at least 2 characters"
            },
            email: {
                required: "Please enter a email address",
                email: "Invalid email format"
            },
            address: "Please enter a address",
            phone: "Please enter a number phone",
        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            if (element.prop('type') === "checkbox") {
                error.insertAfter(element.siblings("label"));
            } else {
                error.insertAfter(element);
            }
        },
        hightline: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid".removeClass("is-valid"));
        },
        unhightline: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
        
    });
});
