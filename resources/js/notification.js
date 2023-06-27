function notification() {
    var sidebar = document.getElementById('sidebar');
    var notification = document.getElementById('notification');

    if (sidebar.style.left === "-200px") {
        sidebar.style.left = "0";
        notification.style.marginLeft = "200px";
    } else {
        sidebar.style.left = "-200px";
        notification.style.marginLeft = "0";
    }
}