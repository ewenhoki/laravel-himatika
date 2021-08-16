jQuery(".form-valide").validate({
    rules: {
        "reason": {
            required: true,
        },
        "generation_id": {
            required: true,
        },
    },
    messages: {
        reason: {
            required: "Keperluan wajib diisi !",
        },
        generation_id: {
            required: "Angkatan wajib dipilih !",
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