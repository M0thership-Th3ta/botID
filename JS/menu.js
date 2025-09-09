window.addEventListener("load", init);

function init() {
    document.getElementById("menu")
    makeMenu();
}

function makeMenu() {
    const menu = document.getElementById("menu");
    const menuContent = document.createElement("div");
    const menuDiv = document.createElement("div");
    const menuTitle = document.createElement("h2");
    const menuUL = document.createElement("ul");
    const menuOption1 = document.createElement("a");
    const menuOption2 = document.createElement("a");
    const menuOption3 = document.createElement("a");
    const menuOption4 = document.createElement("a");
    menuContent.classList.add("menu-toggle")
    menu.appendChild(menuContent);

    // Toggle menu visibility on button click
    menuContent.addEventListener("click", (e) => {
        e.stopPropagation();
        menu.appendChild(menuDiv)
        menuDiv.classList.add("menu-list")
        menuTitle.textContent = "Menu";
        menuOption1.textContent = "Home";
        menuOption1.href = "index.php"
        menuOption2.textContent = "Help";
        menuOption2.href = "help.php";
        menuOption3.textContent = "Contact";
        menuOption3.href = "contact.php";
        menuOption4.textContent = "Log Uit";
        menuOption4.href = "logout.php";
        menuDiv.appendChild(menuTitle);
        menuDiv.appendChild(menuUL)
        menuUL.appendChild(menuOption1)
        menuUL.appendChild(menuOption2)
        menuUL.appendChild(menuOption3)
        menuUL.appendChild(menuOption4)
        menuContent.classList.toggle("disabled");

        document.addEventListener("click", closeMenuOnClickOutside);
    });

    function closeMenuOnClickOutside(e) {
        if (!menu.contains(e.target)) {
            if (menuDiv.parentNode) {
                menuDiv.remove();
            }
            menuContent.classList.remove("disabled");
            document.removeEventListener("click", closeMenuOnClickOutside);
        }
    }
}

