var notificationButton = document.getElementById("notificationButton");
var isNotificationShow = true;
var notificationMenu = document.getElementById("notificationMenu");
notificationButton.addEventListener("click", function () {
    if (isNotificationShow) {
        notificationMenu.classList.add("lg:block");
        isNotificationShow = false;
    } else {
        notificationMenu.classList.remove("lg:block");
        isNotificationShow = true;
    }
});
