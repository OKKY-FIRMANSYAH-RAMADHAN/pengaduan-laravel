document.addEventListener("DOMContentLoaded", function () {
    // Registrasi
    $("#registrasi").prop("disabled", true);

    function checkInputs() {
        var allInputsFilled = true;

        $("#form-registrasi input").each(function () {
            if ($(this).val() === "") {
                allInputsFilled = false;
                return false;
            }
        });

        $("#registrasi").prop("disabled", !allInputsFilled);
    }

    $("#form-registrasi input").on("input", function () {
        checkInputs();
    });

    $("#password").on("input", function () {
        if ($(this).val().length >= 8) {
            $("#password").removeClass("is-invalid");
            $("#minPassword").text("");
        } else {
            $("#password").addClass("is-invalid");
            $("#minPassword").text("Minimal 8 Karakter");
        }
    });

    $("#passwordKonfirmasi").on("input", function () {
        if ($(this).val() === document.getElementById("password").value) {
            $("#passwordKonfirmasi").removeClass("is-invalid");
            $("#notSamePassword").text("");
        } else {
            $("#passwordKonfirmasi").addClass("is-invalid");
            $("#notSamePassword").text("Password Tidak Sama");
        }
    });

    $("#registrasi").click(function (event) {
        event.preventDefault();
        var formData = new FormData($("#form-registrasi")[0]);
        $.ajax({
            url: "/register/auth",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.status === "success") {
                    Swal.fire({
                        title: "Sukses!",
                        text: data.message,
                        icon: "success",
                        confirmButtonText: "OK",
                    });
                    document
                        .querySelectorAll("#form-registrasi input")
                        .forEach((input) => (input.value = ""));
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: data.message[Object.keys(data.message)[0]][0],
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                }
            },
        });
    });
    // End Registrasi

    // Login
    $("#masuk").prop("disabled", true);

    function checkInputsLogin() {
        var allInputsFilled = true;

        $("#form-login input").each(function () {
            if ($(this).val() === "") {
                allInputsFilled = false;
                return false;
            }
        });

        $("#masuk").prop("disabled", !allInputsFilled);
    }

    $("#form-login input").on("input", function () {
        checkInputsLogin();
    });

    $("#masuk").click(function (event) {
        event.preventDefault();
        var formData = new FormData($("#form-login")[0]);
        $.ajax({
            url: "/login/auth",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.status === "success") {
                    Swal.fire({
                        title: "Sukses!",
                        text: data.message,
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: data.message,
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                }
            },
        });
    });
    // End Login
});
