$(document).ready(function() {

    function validate(x) {
        if (!$("#name").val() || !$("#email").val() || !$("#message").val()) {
            alert("one of the fields is missing")
            return false
        }
        x = true;
    }

    $("#contactForm").click(function() {
        var x = false;
        validate(x);
        if (!x) { return } else {

            alert("on");
        }
    });

    $("#contactForm").submit(function(event) {
        // cancels the form submission
        event.preventDefault();
        submitForm();
    });

    function submitForm() {
        // Initiate Variables With Form Content
        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        alert(name, email, message)
        $.ajax({
            type: "POST",
            url: "http://127.0.0.1/HIT/lavan/wp-content/themes/btstrp_john_child/mail-send.php",
            data: "name=" + name + "&email=" + email + "&message=" + message,
            success: function(text) {
                if (text == "success") {
                    formSuccess();
                }
            }
        });
    }

    function formSuccess() {
        alert("success")
        $("#msgSubmit").removeClass("hidden");
    }

});