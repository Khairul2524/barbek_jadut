// semua
// tombol hapus
$('.tombol-hapus').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href')
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data akan Dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus !'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href
        }
    })
})
// tombol semster
// tombol tambah
$(function () {
    $('.tampiltambah').on('click', function () {
        $('#labelmodal').html('Tambah Semester')
        $('.modal-footer button[type=submit]').html('Tambah')
        $('#id').val('')
        $('#tahun').val('')
    })
})
// tombol ubah
$(function () {
    $('.tampilubah').on('click', function () {
        $('#labelmodal').html('Ubah Semester')
        $('.modal-footer button[type=submit]').html('Ubah')
        $('.modal-body form').attr('action', 'http://localhost/sibasmkit/semester/simpanubah')
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/sibasmkit/semester/ubah',
            data: {
                ids: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.idsemester)
                $('#tahun').val(data.tahundiklat)
            }
        })
    })
})
// tombol ap
// tombol tambah
$(function () {
    $('.tampiltambahap').on('click', function () {
        $('#labelmodal').html('Tambah Aspek Pembayaran')
        $('.modal-footer button[type=submit]').html('Tambah')
    })
})
// tombol ubah
$(function () {
    $('.tampilubahap').on('click', function () {
        $('#labelmodal').html('Ubah Aspek Pembayaran')
        $('.modal-footer button[type=submit]').html('Ubah')
        $('.modal-content form').attr('action', 'http://localhost/sibasmkit/ap/simpanubah')
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/sibasmkit/ap/ubah',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.idap)
                $('#ap').val(data.ap)
                $('#jumlah').val(data.jumlah)
            }
        })
    })
})

// tombol kelas
// tombol tambah
$(function () {
    $('.tampiltambahkelas').on('click', function () {
        $('#labelmodal').html('Tambah Kelas')
        $('.modal-footer button[type=submit]').html('Tambah')
    })
})
// tombol ubah
$(function () {
    $('.tampilubahkelas').on('click', function () {
        $('#labelmodal').html('Ubah Kelas')
        $('.modal-footer button[type=submit]').html('Ubah')
        $('.modal-content form').attr('action', 'http://localhost/sibasmkit/kelas/simpanubah')
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/sibasmkit/kelas/ubah',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                // console.log(data)
                $('#id').val(data.idkelas)
                $('#kelas').val(data.namakelas)
                $('#jurusan').val(data.jurusan)
            }
        })
    })
})
