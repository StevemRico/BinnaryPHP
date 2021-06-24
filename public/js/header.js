function sidebarexpanded() {
    // document.getElementById("mySidenav").style.width = "250px";
    var side = document.getElementById('sidemenu');
        // const sidewidth = document.querySelector(':root');
        side.classList.toggle("sidemenu-menu-expanded");
        side.classList.toggle("sidemenu-menu-collapsed");
        if (side.className === 'sidemenu-menu-expanded') {
            // sidewidth.style.setProperty('--sidemenu-width','250px');
        } else if (side.className === 'sidemenu-menu-collapsed') {
            // sidewidth.style.setProperty('--sidemenu-width','50px');
        }
  }