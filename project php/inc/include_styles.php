<script>
    function myFunction(button) {
        button.classList.toggle("filter-active");
        filter();
    }

    function filter() {

        var names = document.querySelectorAll(".food-item");

        names.forEach(name => {
            var h3 = name.querySelector("h3");
            console.log(h3.textContent)
            if (name.style.display != "none" && h3.textContent.includes("Chicken")) {
                name.style.display = "none";
            } else {
                name.style.display = "flex";
                name.style.flexDirection = "column";
                name.style.alignItems = "center";
            }
        });
    }
</script>