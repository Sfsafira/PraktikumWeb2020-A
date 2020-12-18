$(document).ready(function(){
    $(".liatfototutor, .liatijasahtutor").click(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            success: function(data){
                $(".isinyat").html(data);
            }
        });
        $("#fotoijasahtutor").modal('show');
    });
    $(".profilsiswa").click(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            success: function(data){
                $(".isiprofilsiswa").html(data);
            }
        });
        $("#profilesiswa").modal('show');
    });
    $(".profiltutor").click(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            success: function(data){
                $(".isiprofiltutor").html(data);
            }
        });
        $("#profiletutor").modal('show');
    });
    $(".liatdetailtutor, .liatbuktibayar").click(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            dataType: 'json',
            success: function(data){
                $(".isidetailtutor").html(data[0]);
                $(".tomboldetailtutor").html(data[1]);
            }
        });
        $("#detailtutor").modal('show');
    });
    $(".sukses").each(function(){
        Swal.fire(
            'Sukses dong',
            'Berhasil nambah data',
            'success'
        )
    })
    $(".hapustutor, .hapusreservasi").click(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Confirm',
            text: 'Anda yakin ingin hapus?',
            icon: 'question',
            showCancelButton: true,
        }).then((result) => {
            if(result.isConfirmed) {
                $.ajax({
                    url: $(this).attr("href"),
                    dataType: 'html',
                    success: function(msg){
                        if(msg == 'Sukses')
                            Swal.fire(
                                'Sukses dong',
                                'Berhasil hapus dong',
                                'success'
                            ).then((result)=> {window.location.href = ''; });
                        else
                            Swal.fire(
                                'Gagal',
                                'Terjadi Kesalahan',
                                'error'
                            ).then((result)=> {window.location.href = ''; });
                    }
                })
            }
        })
    });
    $(".editprofil").submit(function(e){
        e.preventDefault();
        console.log($(this).serialize());
        var nama = window.location.pathname;
        var lg = nama.split("/");
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            success: function(msg){
                if(msg == "Sukses"){
                    Swal.fire(
                        'Sukses dong',
                        'Berhasil edit profile',
                        'success'
                    ).then((result)=> {window.location.href = '../'+ lg[3] +'/dashboard'; });
                }else window.location.href = msg;
            }
        })
    })
    $(".liatdetailsiswa").click(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            dataType: 'json',
            success: function(data){
                $(".isidetailsiswa").html(data[0]);
                $(".tomboldetailsiswa").html(data[1]);
            }
        });
        $("#detailsiswa").modal('show');
    });
    $(".detailtutor").click(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            dataType: 'json',
            success: function(string){
                $(".isiprofile").html(string[0]);
                $(".isibawah").html(string[1]);
            }
        });
        $("#modalprofilTutor").modal('show');
    });
    $(".buktibayar").submit(function(e){
        e.preventDefault();
        var data = new FormData(this);
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(msg){
                if(msg == "Sukses"){
                    Swal.fire(
                        'Sukses',
                        'Berhasil upload bukti',
                        'success'
                    ).then((result)=> {window.location.href = ''; });
                }
                else window.location.href = msg;
            }
        })
    })
    $(".formreservasi").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            success: function(msg){
                if(msg == "Sukses"){
                    Swal.fire(
                        'Sukses',
                        'Berhasil melakukan reservasi',
                        'success'
                    ).then((result)=> {window.location.href = '../dashboard'; });
                }else if(msg == "Ada"){
                    Swal.fire({
                        title: 'Gagal',
                        html: 'Anda dengan sudah melakukan reservasi tutor ini<br>Dan di mata pelajaran ini juga',
                        icon: 'error'
                    });
                }
                else window.location.href = msg;
            }
        })
    });
    $(".logout").click(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Logout',
            text: 'Anda yakin ingin logout?',
            icon: 'question',
            showCancelButton: true,
        }).then((result) => {
            if(result.isConfirmed) {
                window.location.href = $(this).attr('href');
            }
        })
    })
    
});
function updateterima(param){
    data = param + "="
    $(".updatediterima").submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Anda yakin?',
            text: 'Sekalinya anda rubah, dia tidak bisa dirubah lagi',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, yakin!',
            cancelButtonText: 'Jangan deh',
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    type: $(".updatediterima").attr("method"),
                    url: $(".updatediterima").attr("action"),
                    data: data,
                    dataType: 'html',
                    success: function(msg){
                        if(msg == 'Sukses')
                            Swal.fire(
                                'Sukses dong',
                                'Berhasil ngubah status siswa',
                                'success'
                            ).then((result)=> {window.location.href = ''; });
                        else
                            Swal.fire(
                                'Gagal',
                                'Terjadi Kesalahan',
                                'error'
                            ).then((result)=> {window.location.href = ''; });
                                
                    }
                })
            }
        });
    });
}

function veriftutor()
{
    $(".konfirm").click(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Confirm',
            text: "Anda yakin ubah status tutor ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Yakin dong!',
            cancelButtonText: 'Ga, jangan deh',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: $(this).attr("href"),
                        dataType: 'html',
                        success: function(cek){
                            if(cek == 'Sukses')
                                Swal.fire(
                                    'Sukses dong',
                                    'Berhasil ngubah status tutor',
                                    'success'
                                ).then((result)=> {window.location.href = ''; });
                            else
                                Swal.fire(
                                    'Gagal',
                                    'Terjadi Kesalahan',
                                    'error'
                                ).then((result)=> {window.location.href = ''; });  
                        }
                    }) 
                }
            })
    })
}