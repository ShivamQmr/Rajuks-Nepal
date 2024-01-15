document.getElementById("registrationForm").addEventListener("submit", function(event) {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    if (username === "" || email === "" || password === "") {
        alert("All fields must be filled out");
        event.preventDefault();
    }
});
