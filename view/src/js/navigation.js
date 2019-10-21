/* Open the sidenav */
function openNav() {
    document.getElementById("side_nav").style.width = "100%";
}

/* Close/hide the sidenav */
function closeNav() {
    document.getElementById("side_nav").style.width = "0";
}

/* Set the navigation bar title when a menu item is clicked */
function setTitle(title) {
    // Navigation bar title
    document.getElementById("title").innerHTML = title;
    // Page title (shown in chrome tab)
    document.title = title;
    // Menu item must have been clicked, close the menu
    closeNav()
}