var button = document.getElementById("myButton");
var dropdownMenu = document.getElementById("dropdownMenus");
var isDropdownVisible = false;

button.addEventListener("click", function () {
    if (isDropdownVisible) {
        dropdownMenu.classList.add("hidden");
        isDropdownVisible = false;
    } else {
        dropdownMenu.classList.remove("hidden");
        isDropdownVisible = true;
    }
});
