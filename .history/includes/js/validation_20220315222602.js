function recruitname_validation() {
    'use strict';
    var recruitname_name = document.getElementById("recruitName");
    var recruitname_value = document.getElementById("recruitName").value;
    var recruitname_length = recruitname_value.length;
    if (recruitname_length < 7 || recruitname_length > 12) {
        document.getElementById('rid_err').innerHTML = 'Value must not be less than 7 characters and greater than 12 characters';
        recruitname_name.focus();
        document.getElementById('rid_err').style.color = "#FF0000";
    } else {
        document.getElementById('rid_err').innerHTML = 'Valid Recruit Name';
        document.getElementById('rid_err').style.color = "#00AF33";
    }
}

// Job Validation
function job_validation() {
    'use strict';
    var job_name = document.getElementById("job");
    var job_value = document.getElementById("job").value;
    var job_length = job_value.length;
    var letters = /^[-@.,'%$\/#&+\w\s]*$/;
    if (description_length < 10 || !description_value.match(letters)) {
        document.getElementById('job_err').innerHTML = 'job must contain letters and can contain alphanumeric characters as well.';
        description_name.focus();
        document.getElementById('job_err').style.color = "#FF0000";
    } else {
        document.getElementById('job_err').innerHTML = 'Valid Product Description';
        document.getElementById('job_err').style.color = "#00AF33";
    }
}

// image Validation
function img_validation() {
    'use strict';
    var image_name = document.getElementById("image");
    var image_value = document.getElementById("image").value;
    if (image_value == "") {
        document.getElementById('image_err').innerHTML = 'Please select an image';
        image_name.focus();
        document.getElementById('image_err').style.color = "#FF0000";
    } else {
        document.getElementById('image_err').innerHTML = 'Valid image';
        document.getElementById('image_err').style.color = "#00AF33";
    }
}
//user name validation ends
//country validation starts
function country_validation() {
    'use strict';
    var country_name = document.getElementById("country");
    var country_value = document.getElementById("country").value;
    if (country_value === "Default" || country_value === "--") {
        document.getElementById('country_err').innerHTML = 'You must select a country';
        country_name.focus();
        document.getElementById('country_err').style.color = "#FF0000";
    } else {
        document.getElementById('country_err').innerHTML = 'Country selected.';
        document.getElementById('country_err').style.color = "#00AF33";
    }
}
//country validation ends
//zip validation starts
function zip_validation() {
    'use strict';
    var numbers = /^[0-9]+$/;
    var zip_name = document.getElementById("zip");
    var zip_value = document.getElementById("zip").value;
    var zip_length = zip_value.length;
    if (!zip_value.match(numbers) || zip_length !== 5) {
        document.getElementById('zip_err').innerHTML = 'You must enter a ZIP code, which must be numeric and must be at least 5 chracters long.';
        zip_name.focus();
        document.getElementById('zip_err').style.color = "#FF0000";
    } else {
        document.getElementById('zip_err').innerHTML = 'ZIP code entered';
        document.getElementById('zip_err').style.color = "#00AF33";
    }
}
//zip validation ends
//email validation starts
function email_validation() {
    'use strict';
    var mailformat = /^\w+([\.\-]?\w+)*@\w+([\.\-]?\w+)*(\.\w{2,3})+$/;
    var email_name = document.getElementById("email");
    var email_value = document.getElementById("email").value;
    var email_length = email_value.length;
    if (!email_value.match(mailformat) || email_length === 0) {
        document.getElementById('email_err').innerHTML = 'This is not a valid email format.';
        email_name.focus();
        document.getElementById('email_err').style.color = "#FF0000";
    } else {
        document.getElementById('email_err').innerHTML = 'Valid email format';
        document.getElementById('email_err').style.color = "#00AF33";
    }
}
//email validation ends
//gender validation starts
function gender_validation() {
    'use strict';
    if ((document.getElementById("msex").checked === false) && (document.getElementById("fsex").checked === false)) {
        document.getElementById('gender_err').innerHTML = 'Please slect a geneder.';
        document.getElementById('gender_err').style.color = "#FF0000";
        document.getElementById("msex").checked = true;
    } else {
        document.getElementById('gender_err').innerHTML = 'Gender selected';
        document.getElementById('gender_err').style.color = "#00AF33";
    }
}