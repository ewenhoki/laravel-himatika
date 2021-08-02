$('.shutdown').click(function(){
    swal({   
        title: "Ganti Status Web ?",   
        text: "Klik tombol yang sama untuk mengubah status aktif web lagi.",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Ya",   
        cancelButtonText: "Tidak",   
    })
    .then(function(WillDelete){
        if(WillDelete.value){
            window.location = "/";
        }
    });
});
$('.logout').click(function(){
    swal({   
        title: "Logout ?",   
        text: "Anda harus melakukan login ulang untuk masuk kembali.",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Ya",   
        cancelButtonText: "Tidak",   
    })
    .then(function(WillDelete){
        if(WillDelete.value){
            window.location = "/logout";
        }
    });
});