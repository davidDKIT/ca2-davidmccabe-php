// recruit Name Validation
function recruitName_validation() {
    'use strict';
    var recruit_name = document.getElementById("recruitName");
    var recruit_value = document.getElementById("recruitName").value;
    var recruit_length = recruit_value.length;
    var letters = /^[0-9A-Za-z ]*$/;
    if (recruit_length < 4 || !recruit_value.match(letters)) {
        document.getElementById('recruitName_err').innerHTML = 'Recruit Name must be at least 4 characters long and can contain numbers.';
        recruit_name.focus();
        document.getElementById('recruitName_err').style.color = "#FF0000";
    } else {
        document.getElementById('name_err').innerHTML = 'Valid recruit Name';
        document.getElementById('name_err').style.color = "#00AF33";
    }
}

// recruit job Validation
function recruitJob_validation() {
    'use strict';
    var job_name = document.getElementById("job");
    var job_value = document.getElementById("job").value;
    var job_length = job_value.length;
    var letters = /^[-@.,'%$\/#&+\w\s]*$/;
    if (job_length < 50 || !job_value.match(letters)) {
        document.getElementById('job_err').innerHTML = 'recruit job must contain letters and can contain alphanumeric characters as well.';
        job_name.focus();
        document.getElementById('job_err').style.color = "#FF0000";
    } else {
        document.getElementById('job_err').innerHTML = 'Valid recruit job';
        document.getElementById('job_err').style.color = "#00AF33";
    }
}