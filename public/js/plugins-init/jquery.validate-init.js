// patient form validation
jQuery(".patient-form").validate({
    rules: {
        hsc_id: {
            required: !0,
        },
        // anc_number: {
        //     required: !0,
        // },
        gravida: {
            required: !0,
            range: [0, 10],
        },
        pw_height: {
            required: !0,
        },
        bp_systolic: {
            required: !0,
            range: [70, 190],
        },
        // an_reg_date: {
        //     required: !0,
        // },
        rch_id: {
            required: !0,
        },
        para: {
            required: !0,
            range: [0, 10],
        },
        mother_weight: {
            required: !0,
        },
        // bp_diastolic: {
        //     required: !0,
        //     range: [40, 100],
        // },
    },
    messages: {
        hsc_id: {
            required: "Please Select a HSC Name",
        },
        anc_number: {
            required: "Please Enter SL.No of ANC",
        },
        gravida: {
            required: "Please Enter a Gravida Range",
            range: "The range must between 0 to 10",
        },
        pw_height: {
            required: "Please Enter a PW Height",
        },
        bp_systolic: {
            required: "Please Enter a BP Systolic",
            range: "The range must between 70 to 190",
        },
        an_reg_date: {
            required: "Please Select a date",
        },
        rch_id: {
            required: "Please Select RCH ID",
        },
        para: {
            required: "Please Enter a Para Range",
            range: "The range must between 0 to 10",
        },
        mother_weight: {
            required: "Please Enter a Mother's Weight",
        },
        bp_diastolic: {
            required: "Please Enter a BP Diastolic",
            range: "The range must between 40 to 100",
        },
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function (e, a) {
        jQuery(a).parents(".form-group > div").append(e);
    },
    highlight: function (e) {
        jQuery(e)
            .closest(".form-group")
            .removeClass("is-invalid")
            .addClass("is-invalid");
    },
    success: function (e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"),
            jQuery(e).remove();
    },
});
// mother medical form validation
jQuery(".mother-medical-form").validate({
    rules: {
        hsc_id: {
            required: !0,
        },
        rch_id: {
            required: !0,
        },
        lmp_date: {
            required: !0,
        },
        is_vdrl_rpp: {
            required: !0,
        },
        eligible_for_mrmbs: {
            required: !0,
        },
        hbsag_done: {
            required: !0,
        },
        hbsag_status: {
            required: !0,
        },
        wife_hiv_screening: {
            required: !0,
        },
        wife_hiv_screeing_date: {
            required: !0,
        },
        wife_hiv_screeing_result: {
            required: !0,
        },
        husband_hiv_screening: {
            required: !0,
        },
        husband_hiv_screeing_date: {
            required: !0,
        },
        husband_hiv_screeing_result: {
            required: !0,
        },
        hospital_type_id: {
            required: !0,
        },
    },
    messages: {
        hsc_id: {
            required: "Please Select a HSC Name",
        },
        rch_id: {
            required: "Please Select RCH ID",
        },
        lmp_date: {
            required: "Please Select LMP Date",
        },
        is_vdrl_rpp: {
            required: "Please Select a VDRL/RPP",
        },
        eligible_for_mrmbs: {
            required: "Please Select a Mother's Eligibility for MRMBS",
        },
        hbsag_done: {
            required: "Please Select HBsAg Done",
        },
        hbsag_status: {
            required: "Please Select HBsAg Status",
        },
        wife_hiv_screening: {
            required: "Please Select Wife HIV Screening Test",
        },
        wife_hiv_screeing_date: {
            required: "Please Select Wife HIV Screening Date",
        },
        wife_hiv_screeing_result: {
            required: "Please Select Wife HIV Screening Result",
        },
        husband_hiv_screening: {
            required: "Please Select Husband HIV Screening Test",
        },
        husband_hiv_screeing_date: {
            required: "Please Select Husband HIV Screening Date",
        },
        husband_hiv_screeing_result: {
            required: "Please Select Husband HIV Screening Result",
        },
        hospital_type_id: {
            required: "Please Select the Type of Hospital",
        },
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function (e, a) {
        jQuery(a).parents(".form-group > div").append(e);
    },
    highlight: function (e) {
        jQuery(e)
            .closest(".form-group")
            .removeClass("is-invalid")
            .addClass("is-invalid");
    },
    success: function (e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"),
            jQuery(e).remove();
    },
});

jQuery(".form-valide").validate({
    rules: {
        "val-username": {
            required: !0,
            minlength: 3,
        },
        "val-email": {
            required: !0,
            email: !0,
        },
        "val-password": {
            required: !0,
            minlength: 5,
        },
        "val-confirm-password": {
            required: !0,
            equalTo: "#val-password",
        },
        "val-select2": {
            required: !0,
        },
        "val-select2-multiple": {
            required: !0,
            minlength: 2,
        },
        "val-suggestions": {
            required: !0,
            minlength: 5,
        },
        "val-skill": {
            required: !0,
        },
        "val-currency": {
            required: !0,
            currency: ["$", !0],
        },
        "val-website": {
            required: !0,
            url: !0,
        },
        "val-phoneus": {
            required: !0,
            phoneUS: !0,
        },
        "val-digits": {
            required: !0,
            digits: !0,
        },
        "val-number": {
            required: !0,
            number: !0,
        },
        "val-range": {
            required: !0,
            range: [1, 5],
        },
        "val-terms": {
            required: !0,
        },
    },
    messages: {
        "val-username": {
            required: "Please enter a username",
            minlength: "Your username must consist of at least 3 characters",
        },
        "val-email": "Please enter a valid email address",
        "val-password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
        },
        "val-confirm-password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above",
        },
        "val-select2": "Please select a value!",
        "val-select2-multiple": "Please select at least 2 values!",
        "val-suggestions": "What can we do to become better?",
        "val-skill": "Please select a skill!",
        "val-currency": "Please enter a price!",
        "val-website": "Please enter your website!",
        "val-phoneus": "Please enter a US phone!",
        "val-digits": "Please enter only digits!",
        "val-number": "Please enter a number!",
        "val-range": "Please enter a number between 1 and 5!",
        "val-terms": "You must agree to the service terms!",
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function (e, a) {
        jQuery(a).parents(".form-group > div").append(e);
    },
    highlight: function (e) {
        jQuery(e)
            .closest(".form-group")
            .removeClass("is-invalid")
            .addClass("is-invalid");
    },
    success: function (e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"),
            jQuery(e).remove();
    },
});

jQuery(".form-valide-with-icon").validate({
    rules: {
        "val-username": {
            required: !0,
            minlength: 3,
        },
        "val-password": {
            required: !0,
            minlength: 5,
        },
    },
    messages: {
        "val-username": {
            required: "Please enter a username",
            minlength: "Your username must consist of at least 3 characters",
        },
        "val-password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
        },
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function (e, a) {
        jQuery(a).parents(".form-group > div").append(e);
    },
    highlight: function (e) {
        jQuery(e)
            .closest(".form-group")
            .removeClass("is-invalid")
            .addClass("is-invalid");
    },
    success: function (e) {
        jQuery(e)
            .closest(".form-group")
            .removeClass("is-invalid")
            .addClass("is-valid");
    },
});
