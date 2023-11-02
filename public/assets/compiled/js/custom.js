document.addEventListener("DOMContentLoaded", function () {
    function formatTanggal(tanggalString) {
        const options = { day: "numeric", month: "long", year: "numeric" };
        const tanggal = new Date(tanggalString);
        return tanggal.toLocaleDateString("id-ID", options);
    }

    $(document).on("click", "#tombolDetail", function () {
        var kode = $(this).attr("data-kode");
        var currentPath = window.location.pathname;

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
                    var src = `${window.location.origin}/assets/uploads/bukti/${dataPengaduan["id_pengaduan"]}/${dataGambar[i]["nama_foto"]}`;
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

    $(document).on("click", "#tombolHapus", function () {
        var kode = $(this).attr("data-kode");
        var currentPath = window.location.pathname;

        console.log(currentPath + "/delete/" + kode);

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
            }
        });
    });

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
                Swal.fire(
                    "Berhasil!",
                    "Pengaduan ini sedang di proses",
                    "success"
                );
            }
        });
    });

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
                Swal.fire(
                    "Berhasil!",
                    "Pengaduan ini berhasil diselesaikan",
                    "success"
                );
            }
        });
    });

    $(document).on("click", "#tombolSetuju", function () {
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
                Swal.fire("Berhasil!", "User berhasil disetujui", "success");
            }
        });
    });

    $(document).on("click", "#viewIdentitas", function () {
        $("#modalIdentitas").modal("show");
    });

    $(document).on("click", "#tombolGambar", function () {
        var src = $(this).find("img").attr("src");
        $("#gambarDetail").attr("src", src);
        $("#modalViewImage").modal("show");
    });

    $(document).on("click", "#tombolGantiPassword", function () {
        $("#modalGantiPassword").modal("show");
    });

    $(document).on("click", "#gantiGambar", function () {
        $("#fileInput").click();
    });

    $(document).on("change", "#fileInput", function (event) {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#gambarAwal").attr("src", e.target.result);
        };

        reader.readAsDataURL(selectedFile);
    });

    $(document).on("click", "#tombolBuat", function () {
        $("#buatPengaduan").modal("show");
    });

    $(document).on("change", "#fotoMultiple", function (event) {
        var files = event.target.files;
        var maxFiles = 6;
        var imageContainer = $("#imageContainer");
        if (files.length > maxFiles) {
            Swal.fire("Error!", "Maksimal Hanya 6 Foto", "error");
            $(this).val("");
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
});
