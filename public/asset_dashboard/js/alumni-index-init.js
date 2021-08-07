$('#year').yearpicker();
$('#year_edit').yearpicker();
$('#year_job').yearpicker();
$('#year_job_edit').yearpicker();
$('#year_ctf').yearpicker();
$('#year_ctf_edit').yearpicker();
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
jQuery(".education-valide").validate({
    rules: {
        "level": {
            required: true,
        },
        "year": {
            required: true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
        "university": {
            required: true,
            minlength: 4,
        },
        "major": {
            required: true,
            minlength: 4,
        },
    },
    messages: {
        level: {
            required: "Tingkat Wajib Dipilih !",
        },
        year: {
            required: "Tahun Wajib Diisi !",
            number: "Masukan nomor yang valid !",
            minlength: "Isi paling sedikit {0} karakter !",
            maxlength: "Isi paling banyak {0} karakter !",
        },
        university: {
            required: "Universitas Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
        },
        major: {
            required: "Jurusan Wajib Diisi !",
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
jQuery(".job-valide").validate({
    rules: {
        "year": {
            required: true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
        "company_name": {
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
        company_name: {
            required: "Nama Perusahaan Wajib Diisi !",
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
jQuery(".ctf-valide").validate({
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
            required: "Nama Sertifikasi Wajib Diisi !",
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
jQuery(".edu-edit-valide").validate({
    rules: {
        "level": {
            required: true,
        },
        "year": {
            required: true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
        "university": {
            required: true,
            minlength: 4,
        },
        "major": {
            required: true,
            minlength: 4,
        },
    },
    messages: {
        level: {
            required: "Tingkat Wajib Dipilih !",
        },
        year: {
            required: "Tahun Wajib Diisi !",
            number: "Masukan nomor yang valid !",
            minlength: "Isi paling sedikit {0} karakter !",
            maxlength: "Isi paling banyak {0} karakter !",
        },
        university: {
            required: "Universitas Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
        },
        major: {
            required: "Jurusan Wajib Diisi !",
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
jQuery(".job-edit-valide").validate({
    rules: {
        "year": {
            required: true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
        "company_name": {
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
        company_name: {
            required: "Nama Perusahaan Wajib Diisi !",
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
jQuery(".ctf-edit-valide").validate({
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
            required: "Nama Sertifikasi Wajib Diisi !",
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
    var university = $(this).attr('university');
    var level = $(this).attr('level');
    var year = $(this).attr('year');
    var major = $(this).attr('major');
    var id = $(this).attr('education_id');
    $(".modal-body #university_edit").val( university );
    $(".modal-body #level_edit").val( level ); 
    $(".modal-body #year_edit").val( year );
    $(".modal-body #major_edit").val( major ); 
    $(".modal-body #education_id").val( id );
});
$(document).on("click", ".modal-edit2", function () {
    var company_name = $(this).attr('company_name');
    var year = $(this).attr('year');
    var position = $(this).attr('position');
    var id = $(this).attr('job_id');
    $(".modal-body #company_name_edit").val( company_name );
    $(".modal-body #year_job_edit").val( year );
    $(".modal-body #position_edit").val( position ); 
    $(".modal-body #job_id").val( id );
});
$(document).on("click", ".modal-edit3", function () {
    var name = $(this).attr('c_name');
    var year = $(this).attr('year');
    var id = $(this).attr('certification_id');
    $(".modal-body #ctf_name_edit").val( name );
    $(".modal-body #year_ctf_edit").val( year );
    $(".modal-body #ctf_id").val( id );
});