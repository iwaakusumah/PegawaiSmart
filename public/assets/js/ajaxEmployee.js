// form tambah
function confirmSubmit() {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data yang dimasukkan akan disimpan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, simpan!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/employees",
                type: "POST",
                data: $("#employeeForm").serialize(),
                success: function (response) {
                    Swal.fire(
                        "Tersimpan!",
                        "Data pegawai berhasil disimpan.",
                        "success"
                    ).then(() => {
                        window.location.href = "/employees";
                    });
                },
                error: function (response) {
                    Swal.fire(
                        "Gagal!",
                        "Data tidak dapat disimpan. <br>Mohon periksa kembali.",
                        "error"
                    );
                },
            });
        }
    });
}

$(document).ready(function () {
    $("#submitBtn").on("click", confirmSubmit);
});

// Error untuk Status
$("#status").on("change", function () {
    if ($(this).val() === "") {
        $(this).addClass("is-invalid");
        $("#status-error").html("Silakan pilih status");
    } else {
        $(this).removeClass("is-invalid");
        $("#status-error").html("");
    }
});

// Error untuk Gaji
$("#gaji").on("input", function () {
    const gajiValue = $(this).val();
    const errorMessage = $("#gaji-error");

    if (gajiValue === "" || gajiValue <= 0) {
        $(this).addClass("is-invalid");
        if (gajiValue === "") {
            errorMessage.html("Gaji tidak boleh kosong");
        } else {
            errorMessage.html("Gaji harus lebih besar dari 0");
        }
    } else {
        $(this).removeClass("is-invalid");
        errorMessage.html("");
    }
});

// Error untuk Nama
$("#nama").on("input", function () {
    const namaValue = $(this).val();
    const errorMessage = $("#nama-error");

    if (namaValue.trim() === "") {
        $(this).addClass("is-invalid");
        errorMessage.html("Nama tidak boleh kosong");
    } else {
        $(this).removeClass("is-invalid");
        errorMessage.html("");
    }
});

// Error untuk Email
$("#email").on("input", function () {
    const emailValue = $(this).val();
    const errorMessage = $("#email-error");

    if (emailValue.trim() === "") {
        $(this).addClass("is-invalid");
        errorMessage.html("Email tidak boleh kosong");
    } else if (!emailValue.includes("@")) {
        $(this).addClass("is-invalid");
        errorMessage.html("Email tidak valid");
    } else {
        $(this).removeClass("is-invalid");
        errorMessage.html("");
    }
});

// Function untuk tanggal keluar\
$(document).ready(function () {
    // Fungsi untuk mengatur status input tanggal keluar
    function toggleTanggalKeluar() {
        if ($("#status").val() === "Tetap") {
            $("#tanggal_keluar").val(""); // Kosongkan nilai input tanggal keluar
            $("#tanggal_keluar").prop("disabled", true); // Nonaktifkan input
        } else {
            $("#tanggal_keluar").prop("disabled", false); // Aktifkan input
        }
    }

    // Panggil fungsi saat halaman dimuat
    toggleTanggalKeluar();

    // Tambahkan event listener untuk menangani perubahan pada select status
    $("#status").change(function () {
        toggleTanggalKeluar();
    });
});

$(document).ready(function () {
    // Validasi tanggal keluar saat status berubah
    $("#status").on("change", function () {
        const selectedStatus = $(this).val();
        const tanggalKeluar = $("#tanggal_keluar").val();

        // Status yang memerlukan tanggal keluar
        const statusesRequireTanggalKeluar = [
            "Magang",
            "Kontrak",
            "Pensiun",
            "Layoff",
            "Resign",
        ];

        // Cek jika status yang dipilih memerlukan tanggal keluar
        if (statusesRequireTanggalKeluar.includes(selectedStatus)) {
            if (tanggalKeluar === "") {
                $("#tanggal_keluar").addClass("is-invalid"); // Tambahkan kelas invalid
                $("#tanggal_keluar-error").html("Tanggal keluar harus diisi"); // Tampilkan pesan error
            } else {
                $("#tanggal_keluar").removeClass("is-invalid"); // Hapus kelas invalid
                $("#tanggal_keluar-error").html(""); // Kosongkan pesan error
            }
        } else {
            $("#tanggal_keluar").removeClass("is-invalid"); // Hapus kelas invalid jika status tidak memerlukan tanggal keluar
            $("#tanggal_keluar-error").html(""); // Kosongkan pesan error
        }
    });

    // Validasi tanggal keluar saat input tanggal keluar berubah
    $("#tanggal_keluar").on("input", function () {
        if ($(this).val() !== "") {
            $(this).removeClass("is-invalid"); // Hapus kelas invalid
            $("#tanggal_keluar-error").html(""); // Kosongkan pesan error
        }
    });
});

// form edit
$(document).ready(function () {
    $("#submitForm").on("click", function (e) {
        e.preventDefault();
        var form = $("#editForm");
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Anda akan menyimpan perubahan ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, simpan!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: form.attr("action"),
                    data: form.serialize(),
                    success: function (response) {
                        Swal.fire(
                            "Berhasil!",
                            "Data telah diperbarui.",
                            "success"
                        ).then(() => {
                            window.location.href = "/employees";
                        });
                    },
                    error: function (xhr, status, error) {
                        Swal.fire(
                            "Gagal!",
                            "Data tidak dapat disimpan. <br>Mohon periksa kembali.",
                            "error"
                        );
                    },
                });
            }
        });
    });
});

// form hapus
$(document).ready(function () {
    $(".deleteButton").on("click", function (e) {
        e.preventDefault();
        var form = $(this).closest("form");
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Anda tidak dapat mengembalikan ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: form.attr("action"),
                    data: form.serialize(),
                    success: function (response) {
                        form.closest(".employee-item").fadeOut(
                            300,
                            function () {
                                $(this).remove();
                            }
                        );
                        Swal.fire(
                            "Terhapus!",
                            "Data Pegawai telah dihapus.",
                            "success"
                        ).then(() => {
                            window.location.href = "/employees";
                        });
                    },
                    error: function (xhr, status, error) {
                        Swal.fire(
                            "Gagal!",
                            "Terjadi kesalahan saat menghapus data.",
                            "error"
                        );
                    },
                });
            }
        });
    });
});
