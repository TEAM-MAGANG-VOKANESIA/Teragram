var moreButton = document.getElementById("moreButton");
var moreDropdownMenu = document.getElementById("moreMenus");
var moreIsDropdownVisible = false;

moreButton.addEventListener("click", function () {
    if (moreIsDropdownVisible) {
        moreDropdownMenu.classList.add("hidden");
        moreIsDropdownVisible = false;
    } else {
        moreDropdownMenu.classList.remove("hidden");
        moreIsDropdownVisible = true;
    }
});
