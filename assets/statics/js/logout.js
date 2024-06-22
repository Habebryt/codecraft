function confirmLogout() {
    const confirmLogout = confirm("Are you sure you want to logout?");
    if (confirmLogout) {
        // window.location.href = "logout.php";
        alert("You are logging Out");
    }
}