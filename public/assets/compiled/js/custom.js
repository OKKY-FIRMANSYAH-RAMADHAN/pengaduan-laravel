document.addEventListener("DOMContentLoaded", function () {
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

    $(document).on("click", "#tombolHapus", function () {
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
                Swal.fire("Berhasil!", "User berhasil dihapus", "success");
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
});
