document.getElementById("drop-button").addEventListener("click", function() {
    document.getElementById("dropdown").classList.add("dropdown-show")
});
window.addEventListener("click", function(event) {
    if (!event.target.matches('.drop-button')) {
        var dropdowns = document.getElementsByClassName("dropdown");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('dropdown-show')) {
                openDropdown.classList.remove('dropdown-show');
            }
        }
    }
});