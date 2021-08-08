$('#period').yearpicker();
$('#year_com').yearpicker();
$('#period_edit').yearpicker();
$('#year_com_edit').yearpicker();
$('#year_seminar').yearpicker();
$('#year_seminar_edit').yearpicker();
$('#year_achievment').yearpicker();
$('#year_ach_edit').yearpicker();
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
jQuery(".organization-valide").validate({
    rules: {
        "period": {
            required: true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
        "name": {
            required: true,
            minlength: 4,
        },
        "position": {
            required: true,
            minlength: 4,
        },
    },
    messages: {
        period: {
            required: "Periode Wajib Diisi !",
            number: "Masukan nomor yang valid !",
            minlength: "Isi paling sedikit {0} karakter !",
            maxlength: "Isi paling banyak {0} karakter !",
        },
        name: {
            required: "Nama Organisasi Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
        },
        position: {
            required: "Posisi Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
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
jQuery(".com-valide").validate({
    rules: {
        "year": {
            required: true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
        "name": {
            required: true,
            minlength: 4,
        },
        "position": {
            required: true,
            minlength: 4,
        },
    },
    messages: {
        year: {
            required: "Tahun Wajib Diisi !",
            number: "Masukan nomor yang valid !",
            minlength: "Isi paling sedikit {0} karakter !",
            maxlength: "Isi paling banyak {0} karakter !",
        },
        name: {
            required: "Nama Kepanitiaan Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
        },
        position: {
            required: "Posisi Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
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
jQuery(".seminar-valide").validate({
    rules: {
        "year": {
            required: true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
        "name": {
            required: true,
            minlength: 4,
        },
    },
    messages: {
        year: {
            required: "Tahun Wajib Diisi !",
            number: "Masukan nomor yang valid !",
            minlength: "Isi paling sedikit {0} karakter !",
            maxlength: "Isi paling banyak {0} karakter !",
        },
        name: {
            required: "Nama Pelatihan Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
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
jQuery(".ach-valide").validate({
    rules: {
        "year": {
            required: true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
        "name": {
            required: true,
            minlength: 4,
        },
        "level": {
            required: true,
            minlength: 4,
        },
    },
    messages: {
        year: {
            required: "Tahun Wajib Diisi !",
            number: "Masukan nomor yang valid !",
            minlength: "Isi paling sedikit {0} karakter !",
            maxlength: "Isi paling banyak {0} karakter !",
        },
        name: {
            required: "Nama Penghargaan/Prestasi Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
        },
        level: {
            required: "Tingkat Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
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
jQuery(".or-edit-valide").validate({
    rules: {
        "period": {
            required: true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
        "name": {
            required: true,
            minlength: 4,
        },
        "position": {
            required: true,
            minlength: 4,
        },
    },
    messages: {
        period: {
            required: "Periode Wajib Diisi !",
            number: "Masukan nomor yang valid !",
            minlength: "Isi paling sedikit {0} karakter !",
            maxlength: "Isi paling banyak {0} karakter !",
        },
        name: {
            required: "Nama Organisasi Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
        },
        position: {
            required: "Posisi Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
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
jQuery(".com-edit-valide").validate({
    rules: {
        "year": {
            required: true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
        "name": {
            required: true,
            minlength: 4,
        },
        "position": {
            required: true,
            minlength: 4,
        },
    },
    messages: {
        year: {
            required: "Tahun Wajib Diisi !",
            number: "Masukan nomor yang valid !",
            minlength: "Isi paling sedikit {0} karakter !",
            maxlength: "Isi paling banyak {0} karakter !",
        },
        name: {
            required: "Nama Kepanitiaan Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
        },
        position: {
            required: "Posisi Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
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
jQuery(".seminar-edit-valide").validate({
    rules: {
        "year": {
            required: true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
        "name": {
            required: true,
            minlength: 4,
        },
    },
    messages: {
        year: {
            required: "Tahun Wajib Diisi !",
            number: "Masukan nomor yang valid !",
            minlength: "Isi paling sedikit {0} karakter !",
            maxlength: "Isi paling banyak {0} karakter !",
        },
        name: {
            required: "Nama Pelatihan Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
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
jQuery(".ach-edit-valide").validate({
    rules: {
        "year": {
            required: true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
        "name": {
            required: true,
            minlength: 4,
        },
        "level": {
            required: true,
            minlength: 4,
        },
    },
    messages: {
        year: {
            required: "Tahun Wajib Diisi !",
            number: "Masukan nomor yang valid !",
            minlength: "Isi paling sedikit {0} karakter !",
            maxlength: "Isi paling banyak {0} karakter !",
        },
        name: {
            required: "Nama Penghargaan/Prestasi Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
        },
        level: {
            required: "Tingkat Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
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
$(document).on("click", ".modal-edit1", function () {
    var name = $(this).attr('o_name');
    var position = $(this).attr('position');
    var period = $(this).attr('period');
    var id = $(this).attr('organization_id');
    $(".modal-body #organization_name_edit").val( name );
    $(".modal-body #position_edit").val( position ); 
    $(".modal-body #period_edit").val( period );
    $(".modal-body #organization_id").val( id );
});
$(document).on("click", ".modal-edit2", function () {
    var name = $(this).attr('com_name');
    var position = $(this).attr('position');
    var year = $(this).attr('year');
    var id = $(this).attr('committee_id');
    $(".modal-body #committee_name_edit").val( name );
    $(".modal-body #position_com_edit").val( position ); 
    $(".modal-body #year_com_edit").val( year );
    $(".modal-body #committee_id").val( id );
});
$(document).on("click", ".modal-edit3", function () {
    var name = $(this).attr('s_name');
    var year = $(this).attr('year');
    var id = $(this).attr('seminar_id');
    $(".modal-body #seminar_name_edit").val( name );
    $(".modal-body #year_seminar_edit").val( year );
    $(".modal-body #seminar_id").val( id );
});
$(document).on("click", ".modal-edit4", function () {
    var name = $(this).attr('ach_name');
    var level = $(this).attr('level');
    var year = $(this).attr('year');
    var id = $(this).attr('achievment_id');
    $(".modal-body #ach_name_edit").val( name );
    $(".modal-body #level_ach_edit").val( level ); 
    $(".modal-body #year_ach_edit").val( year );
    $(".modal-body #achievment_id").val( id );
});