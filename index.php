 $.ajax({
 url: "rest/login?email=" + email + "&pass=" + pass,
 success: function (data) {
 if (data.indexOf('logged') > -1) {
 alert("Hello");
 var button = document.getElementById("button");

 button.style.display = "none";

 } else if (data.indexOf('password') > -1) {
 alert("Password is incorrect.")
 } else if (data.indexOf('email') > -1) {
 alert("Email doesn't exists.")
 } else {
 alert("Email doesn't exists.")
 }
 },
 error: function (data, err) {
 alert("Error occurred, please try again later.")
 }
 })