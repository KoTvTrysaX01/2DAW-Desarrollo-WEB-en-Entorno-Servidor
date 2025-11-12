<script>
    //try other method
    function myFunction(button) {
        event.preventDefault();
        var myForm = document.getElementById("myForm");
        var attributes = document.getElementById("attributes");
        if (button.classList.contains("filter-active")) {
            attributes.value = attributes.value.replace(button.name, '');
        } else {
            if (attributes.value == "") {
                attributes.value = button.name;
            } else {
                attributes.value += ", " + button.name;
            }
        }
        button.classList.toggle("filter-active");
    }


    function checkPassword(field) {
        var password = document.getElementById("password");
        if (field.value != password.value) {
            field.setCustomValidity('Passwords dont match');
            field.reportValidity();
            field.focus();
        }
    }

    // function checkTel(field) {
    //     var re = /([\+][0-9]{2,3})?[0-9]{9}/
    //     if (!re.test(field.value)) {
    //         field.setCustomValidity('Incorrect phone number');
    //         field.reportValidity();
    //         field.focus();
    //     }
    // }

    function getBack() {
        var inputs = document.querySelectorAll('input');
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].required = false;
        }
        document.querySelector("textarea").required = false;
        location.href = "index.php?page=home"
    }
</script>