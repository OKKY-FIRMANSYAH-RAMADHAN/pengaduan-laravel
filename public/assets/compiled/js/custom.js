document.addEventListener("DOMContentLoaded", function () {
    var currentPath = window.location.pathname;

    // Fungsi Tanggal
    function formatTanggal(tanggalString) {
        const options = { day: "numeric", month: "long", year: "numeric" };
        const tanggal = new Date(tanggalString);
        return tanggal.toLocaleDateString("id-ID", options);
    }

    // Notif Sukses
    function notifSukses(data) {
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
    }

    // Notif Error
    function notifError(data) {
        Swal.fire({
            title: "Error!",
            text: data.message,
            icon: "error",
            confirmButtonText: "OK",
        });
    }

    // Membuat Pengaduan
    $("#submitPengaduan").click(function (event) {
        event.preventDefault();
        var formData = new FormData($("#form-tambah-pengaduan")[0]);
        $.ajax({
            url: "/user/pengaduan/insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.status === "success") {
                    notifSukses(data);

                    $("#buatPengaduan").modal("hide");
                    const form = document.getElementById(
                        "form-tambah-pengaduan"
                    );
                    form.reset();
                    var imageContainer = $("#imageContainer");
                    imageContainer.empty();
                }
            },
        });
    });

    // Detail Pengaduan
    $(document).on("click", "#tombolDetail", function () {
        var kode = $(this).attr("data-kode");

        $.ajax({
            url: currentPath + "/detail/" + kode,
            type: "GET",
            data: JSON,
            contentType: false,
            processData: false,
            success: function (response) {
                var dataPengaduan = response["pengaduan"][0];
                var dataGambar = response["gambar"];
                var status = {
                    0: "Belum Diproses",
                    1: "Diproses",
                    2: "Selesai",
                };
                document.getElementById("detail_nama").innerHTML =
                    dataPengaduan["nama_pengadu"];
                document.getElementById("detail_status").innerHTML =
                    status[dataPengaduan["status_pengaduan"]];
                document.getElementById("detail_tanggal").innerHTML =
                    formatTanggal(dataPengaduan["created_at"]);
                document.getElementById("detail_perihal").innerHTML =
                    dataPengaduan["tentang_pengaduan"];
                document.getElementById("detail_rincian").innerHTML =
                    dataPengaduan["deskripsi_pengaduan"];

                // Proses Gambar
                var imageContainer = $("#imageContainerDetail");
                imageContainer.empty();

                for (var i = 0; i < dataGambar.length; i++) {
                    var src = `${window.location.origin}/storage/bukti/${dataPengaduan["id_pengaduan"]}/${dataGambar[i]["nama_foto"]}`;
                    var img = $("<img>")
                        .addClass("p-1")
                        .attr("src", src)
                        .attr("width", "120px");
                    var link = $("<a>")
                        .attr("href", "javascript:void(0);")
                        .attr("id", "tombolGambar")
                        .append(img);
                    var col = $("<div>")
                        .addClass("col-4 col-md-6 col-lg-4")
                        .append(link);
                    imageContainer.append(col);
                }

                $("#detailPengaduan").modal("show");
            },
        });
    });

    // Hapus Pengaduan
    $(document).on("click", "#tombolHapus", function () {
        var kode = $(this).attr("data-kode");

        Swal.fire({
            title: "Yakin Ingin Menghapus Pengaduan ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: currentPath + "/delete/" + kode,
                    type: "GET",
                    data: JSON,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.status === "success") {
                            notifSukses(data);
                        } else {
                            notifError(data);
                        }
                    },
                });
            }
        });
    });

    // Filter Data
    $(document).on("change", "#filterData", function () {
        var status = $("#byStatus").val();
        var month = $("#byMonth").val();
        var range = $('input[name="byRange"]').val();
        var token = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        $.ajax({
            type: "POST",
            url: `${window.location.pathname}/filter-pengaduan`,
            data: {
                _token: token,
                status: status,
                month: month,
                range: range,
            },
            success: function (data) {
                $("#table1 tbody").html(data);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    });

    // Tombol Reset
    $(document).on("click", "#tombolReset", function () {
        var token = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        $.ajax({
            type: "POST",
            url: `${window.location.pathname}/filter-pengaduan`,
            data: {
                _token: token,
            },
            success: function (data) {
                $("#table1 tbody").html(data);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    });

    // Tombol Proses
    $(document).on("click", "#tombolProses", function () {
        var kode = $(this).attr("data-kode");

        Swal.fire({
            title: "Yakin Ingin Memproses ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Proses",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: currentPath + "/proses/" + kode,
                    type: "GET",
                    data: JSON,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.status === "success") {
                            notifSukses(data);
                        } else {
                            notifError(data);
                        }
                    },
                });
            }
        });
    });

    // Tombol Selesai
    $(document).on("click", "#tombolSelesai", function () {
        var kode = $(this).attr("data-kode");

        Swal.fire({
            title: "Yakin Ingin Menyelesaikan Pengaduan ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Selesaikan",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: currentPath + "/selesai/" + kode,
                    type: "GET",
                    data: JSON,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.status === "success") {
                            notifSukses(data);
                        } else {
                            notifError(data);
                        }
                    },
                });
            }
        });
    });

    // Tampil Identitas
    $(document).on("click", "#viewIdentitas", function () {
        var data = $(this).attr("data-kode");
        document.getElementById("fotoIdentitas").src = `${window.location.origin}/storage/identitas/${data}`;
        $("#modalIdentitas").modal("show");
    });

    // Tampil Gambar
    $(document).on("click", "#tombolGambar", function () {
        var src = $(this).find("img").attr("src");
        $("#gambarDetail").attr("src", src);
        $("#modalViewImage").modal("show");
    });

    // Tombol Ganti Password
    $(document).on("click", "#tombolGantiPassword", function () {
        $("#modalGantiPassword").modal("show");
    });

    // Tombol Ganti Gambar
    $(document).on("click", "#gantiGambar", function () {
        $("#fileInput").click();
    });

    // Proses Ubah Gambar
    $(document).on("change", "#fileInput", function (event) {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#gambarAwal").attr("src", e.target.result);
        };

        reader.readAsDataURL(selectedFile);
        var formData = new FormData($("#ubahGambar")[0]);

        $.ajax({
            url: "changeimage",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.status === "success") {
                    notifSukses(data);
                } else {
                    notifError(data);
                }
            },
        });

    });

    // Tampilkan Modal Buat Pengaduan
    $(document).on("click", "#tombolBuat", function () {
        $("#buatPengaduan").modal("show");
    });

    // View Gambar Tambah
    $(document).on("change", "#fotoMultiple", function (event) {
        var files = event.target.files;
        var maxFiles = 6;
        var imageContainer = $("#imageContainer");
        if (files.length > maxFiles) {
            Swal.fire("Error!", "Maksimal Hanya 6 Foto", "error");
            $(this).val("");
            imageContainer.empty();
            return false;
        }

        imageContainer.empty();

        for (var i = 0; i < Math.min(files.length, maxFiles); i++) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var img = $("<img>")
                    .addClass("p-1")
                    .attr("src", e.target.result)
                    .attr("width", "120px");
                var link = $("<a>")
                    .attr("href", "javascript:void(0);")
                    .attr("id", "tombolGambar")
                    .append(img);
                var col = $("<div>")
                    .addClass("col-4 col-md-6 col-lg-4")
                    .append(link);
                imageContainer.append(col);
            };

            reader.readAsDataURL(files[i]);
        }
    });

    // Submit Update User
    $(document).on("click", "#submitDetail", function (event) {
        event.preventDefault();
        var formData = new FormData($("#form-update-user")[0]);
        $.ajax({
            url: "update-user",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.status === "success") {
                    notifSukses(data);
                } else {
                    notifError(data);
                }
            },
        });
    });

    // Ganti Password
    $(document).on("click", "#submitChangePassword", function (event) {
        event.preventDefault();
        var formData = new FormData($("#form-ganti-password")[0]);
        $.ajax({
            url: "ganti-password",
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
                            const form = document.getElementById(
                                "form-ganti-password"
                            );
                            form.reset();
                            $("#modalGantiPassword").modal("hide");
                        }
                    });

                }else{
                    notifError(data);
                }
            },
        });
    });

    // Tombol Modal Detail User
    $(document).on("click", "#btnDetailUser", function () {
        var kode = $(this).attr("data-kode");
        $("#detailUser").modal("show");

        $.ajax({
            url: currentPath + "/detail/" + kode,
            type: "GET",
            data: JSON,
            contentType: false,
            processData: false,
            success: function (response) {
                var dataUser = response[0];
                document.getElementById("nama_user").innerHTML = dataUser["nama_user"];
                document.getElementById("username").innerHTML = dataUser["username"];
                document.getElementById("email_user").innerHTML = dataUser["email_user"];
                document.getElementById("viewIdentitas").setAttribute('data-kode', dataUser['identitas_user']);
                document.getElementById("fotoUser").src = `${window.location.origin}/storage/foto_user/${dataUser["foto_user"]}`;

                $("#detailUser").modal("show");
            },
        });
    });

    // Tombol Hapus User
    $(document).on("click", "#tombolHapusUser", function () {
        var kode = $(this).attr("data-kode");

        Swal.fire({
            title: "Yakin Ingin Menghapus User ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: currentPath + "/delete/" + kode,
                    type: "GET",
                    data: JSON,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.status === "success") {
                            notifSukses(data);
                        } else {
                            notifError(data);
                        }
                    },
                });
            }
        });
    });

    // Tombol Setujui User
    $(document).on("click", "#tombolSetujuUser", function () {
        var kode = $(this).attr("data-kode");

        Swal.fire({
            title: "Yakin Ingin Menyetujui ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Sejutu",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: currentPath + "/verifikasi/" + kode,
                    type: "GET",
                    data: JSON,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.status === "success") {
                            notifSukses(data);
                        } else {
                            notifError(data);
                        }
                    },
                });
            }
        });
    });

});
