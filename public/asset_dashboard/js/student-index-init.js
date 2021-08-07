function myFunction() {
    var x = document.getElementById("password");
    var y = document.getElementById("new_password");
    var z = document.getElementById("confirm_password");
    if (x.type === "password") {
        x.type = "text";
        y.type = "text";
        z.type = "text";
    } else {
        x.type = "password";
        y.type = "password";
        z.type = "password";
    }
}
jQuery(".form-valide").validate({
    rules: {
        "name": {
            required: true,
            minlength: 5,
        },
        "email": {
            required: true,
            email: true,
        },
        "phone": {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 13,
        },
        "income": {
            required: true,
        },
        "name_business": {
            required: function(element) {
                return $("#income").val() == '1';
            },
            minlength: 4,
        },
        "income_business": {
            required: function(element) {
                return $("#income").val() == '1';
            },
        },
        "type": {
            required: function(element) {
                return $("#income").val() == '1';
            },
        },
    },
    messages: {
        name: {
            required: "Nama Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
        },
        email: {
            required: "E-mail Wajib Diisi !",
            email: "Masukan email yang valid !",
        },
        phone: {
            required: "Nomor Telepon Wajib Diisi !",
            number: "Masukan nomor yang valid !",
            minlength: "Isi paling sedikit {0} karakter !",
            maxlength: "Isi paling banyak {0} karakter !",
        },
        income: {
            required: "Keterangan Pendapatan Wajib Diisi !"
        },
        name_business: {
            required: "Nama Usaha Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
        },
        income_business: {
            required: "Kategori Pendapatan Wajib Diisi !",
        },
        type: {
            required: "Jenis Usaha Wajib Diisi !",
        },
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
});
$("select[name='income']").change(function(){
    if ($(this).val() == "1"){
        $("div[name='group1']").show();
    }
    else if($(this).val() == "0" || $(this).val() == ""){
        $("div[name='group1']").hide();
    }
});  
$('.datepicker-default').pickadate({
    monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
    monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
    weekdaysFull: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
    weekdaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum,', 'Sab'],
    today: 'Hari Ini',
    clear: 'Kosongkan',
    close: 'Tutup',
    labelMonthNext: 'Bulan Berikutnya',
    labelMonthPrev: 'Bulan Sebelumnya',
    labelMonthSelect: 'Pilih Bulan',
    labelYearSelect: 'Pilih Tahun',
    format: 'yyyy/mm/dd',
    selectMonths: true,
    max: '0',
    selectYears: 75,
});
jQuery(".password-valide").validate({
    rules: {
        "password": {
            required: true,
        },
        "new_password": {
            required: true,
            minlength: 8,
        },
        "confirm_password": {
            required: true,
            equalTo : "#new_password",
        },
    },
    messages: {
        password: {
            required: "Kata Sandi Lama Wajib Diisi !",
        },
        new_password: {
            required: "Kata Sandi Baru Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
        },
        confirm_password: {
            required: "Konfirmasi Kata Sandi Baru Wajib Diisi !",
            equalTo: "Kata Sandi Tidak Sama !",
        },
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
});