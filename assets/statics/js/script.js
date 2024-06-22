const sidebar = document.getElementById('sidebar');
const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
const collapseSidebarBtn = document.getElementById('collapseSidebarBtn');
const expandSidebarBtn = document.getElementById('expandSidebarBtn');
const sidebarToggleCol = document.getElementById('sidebarToggleCol');
const main = document.getElementById('main');
const smallnav = document.getElementById('smallnav');
const text = document.getElementsByClassName('nav-link-text');
const userpicture = document.getElementById('userpicture');
const firstname = document.getElementById('firstname');
const lastname = document.getElementById('lastname');
const username0 = document.getElementById('username0');
const brandname = document.getElementById('brandname');
const smallimage = document.getElementById('smallimage');
const icon = document.getElementsByClassName('nav-link-icon');
const spinner = document.getElementById('spinner');

toggleSidebarBtn.addEventListener('click', () => {

    smallnav.classList.toggle('mysmallnav');
    smallnav.classList.toggle('hidenav');
    // smallnav.classList.toggle('bg-dark');
    smallnav.classList.toggle('mysmallnav');

});
window.addEventListener('scroll', () => {
    if (window.scrollY > 0) {
        toggleSidebarBtn.classList.add('stickybottom');
        username0.classList.add('stickyname');
    } else {
        toggleSidebarBtn.classList.remove('stickybottom');
        username0.classList.remove('stickyname');
    }
});

// Remove the fixed-top class on horizontal scroll
window.addEventListener('scroll', () => {
    if (window.scrollX > 0) {
        toggleSidebarBtn.classList.remove('stickybottom');
        username0.classList.remove('stickyname');
    }
});

collapseSidebarBtn.addEventListener('click', () => {

    Array.from(text).forEach(element => {
        element.classList.add('d-none');
    });

    Array.from(icon).forEach(element => {
        element.classList.toggle('d-none');
    });

    if (userpicture) {
        userpicture.classList.add('d-none');
    }

    firstname.classList.add('d-none');
    lastname.classList.add('d-none');
    smallimage.classList.toggle('d-none');
    brandname.classList.toggle('mybrandname');
    expandSidebarBtn.classList.toggle('d-none');
    collapseSidebarBtn.classList.toggle('d-md-block');
    sidebar.classList.remove('col-md-3');
    sidebar.classList.add('col-md-1');
    main.classList.remove('col-md-9');
    main.classList.add('col-md-11');

});

expandSidebarBtn.addEventListener('click', () => {

    Array.from(text).forEach(element => {
        element.classList.toggle('d-none');
    });
    Array.from(icon).forEach(element => {
        element.classList.add('d-none');
    });

    if (userpicture) {
        userpicture.classList.toggle('d-none');
    }

    firstname.classList.toggle('d-none');
    lastname.classList.toggle('d-none');
    smallimage.classList.add('d-none');
    expandSidebarBtn.classList.add('d-none');
    collapseSidebarBtn.classList.add('d-md-block');
    brandname.classList.toggle('mybrandname');
    sidebar.classList.add('col-md-3');
    sidebar.classList.toggle('col-md-1');
    main.classList.add('col-md-9');
    main.classList.toggle('col-md-11');

});






document.getElementById('currentYear').textContent = new Date().getFullYear();


