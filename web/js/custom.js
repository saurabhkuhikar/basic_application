$(document).ready(function(){
    $("#profile-dob").change(function(){
        dob = new Date($(this).val());
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
        $("#profile-age").val(age);
    });
});