$("#npm").mask("140110999999");
$(".form-valide").validate({
    rules: {
        "npm": {
            required: true,
            number: true,
            minlength: 12,
            maxlength: 12,
        },
        "name": {
            required: true,
            minlength: 5,
        },
        "generation": {
            required: true,
            number: true,
            minlength: 4,
            maxlength: 4,
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
        "password": {
            required: true,
            minlength: 8
        },
        "password_confirmation": {
            equalTo: "#password"
        },
    },
    messages: {
        npm: {
            required: "NPM Wajib Diisi !",
            number: "Masukan nomor yang valid !",
            minlength: "Isi paling sedikit {0} karakter !",
            maxlength: "Isi paling banyak {0} karakter !",
        },
        name: {
            required: "Nama Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
        },
        generation: {
            required: "Angkatan Wajib Diisi !",
            number: "Masukan nomor yang valid !",
            minlength: "Isi paling sedikit {0} karakter !",
            maxlength: "Isi paling banyak {0} karakter !",
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
        password: {
            required: "Kata Sandi Wajib Diisi !",
            minlength: "Isi paling sedikit {0} karakter !",
        },
        password_confirmation: {
            required: "Konfirmasi Kata Sandi Wajib Diisi !",
            equalTo: "Kata Sandi Tidak Sama !",
        },
    },
    ignore: [],
    errorClass: "my-error-class",
    // validClass: "my-valid-class",
});
function myFunction() {
    var x = document.getElementById("password");
    var y = document.getElementById("password-confirm");
    if (x.type === "password") {
        x.type = "text";
        y.type = "text";
    } else {
        x.type = "password";
        y.type = "password";
    }
}