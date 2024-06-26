// form tambah
function confirmSubmit() {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data yang dimasukkan akan disimpan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, simpan!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/employees',
                type: 'POST',
                data: $('#employeeForm').serialize(),
                success: function(response) {
                    Swal.fire(
                        'Tersimpan!',
                        'Data pegawai berhasil disimpan.',
                        'success'
                    ).then(() => {
                        window.location.href = '/employees';
                    });
                },
                error: function(response) {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat menyimpan data.',
                        'error'
                    );
                }
            });
        }
    });
}

$(document).ready(function() {
    $('#submitBtn').on('click', confirmSubmit);
});

// form edit
$(document).ready(function() {
    $('#submitForm').on('click', function(e) {
        e.preventDefault();
        var form = $('#editForm');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan menyimpan perubahan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, simpan!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function(response) {
                        Swal.fire(
                            'Berhasil!',
                            'Data telah diperbarui.',
                            'success'
                        ).then(() => {
                            window.location.href = '/employees';
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat menyimpan data.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});

// form hapus
$(document).ready(function() {
    $('.deleteButton').on('click', function(e) {
        e.preventDefault();
        var form = $(this).closest('form');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function(response) {
                        form.closest('.employee-item').fadeOut(300, function() {
                            $(this).remove();
                        });
                        Swal.fire(
                            'Terhapus!',
                            'Data Pegawai telah dihapus.',
                            'success'
                        ).then(() => {
                            window.location.href = '/employees';
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat menghapus data.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});