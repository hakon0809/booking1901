function showAll() {
    document.getElementById("searchField").value = "";
    document.getElementById("sjanger").selectedIndex = 0;
    document.getElementById("scene").selectedIndex = 0;
    document.getElementById("year").selectedIndex = 0;
    table = document.getElementById("konsertTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < (tr.length); i++) {
        tr[i].style.display = "";
    }
}

function nameSort() {
    document.getElementById("sjanger").selectedIndex = 0;
    document.getElementById("scene").selectedIndex = 0;
    document.getElementById("year").selectedIndex = 0;
    var i, table, tr, td, toUpper;
    table = document.getElementById("konsertTable");
    toUpper = document.getElementById("searchField").value.toUpperCase();
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < (tr.length); i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(toUpper) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function genreSort() {
    document.getElementById("searchField").value = "";
    document.getElementById("scene").selectedIndex = 0;
    document.getElementById("year").selectedIndex = 0;
    var i, table, tr, td, s, currentSelected, y;
    table = document.getElementById("konsertTable");
    s = document.getElementById("sjanger");
    currentSelected = s.options[s.selectedIndex].text.toUpperCase();
    tr = table.getElementsByTagName("tr");
    for(i = 0;i < (tr.length); i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
            y = td.innerHTML.toUpperCase();
            if (y == currentSelected) {
                tr[i].style.display = "";
            } else if (s.options[s.selectedIndex].value == 0) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function sceneSort() {
    document.getElementById("searchField").value = "";
    document.getElementById("sjanger").selectedIndex = 0;
    document.getElementById("year").selectedIndex = 0;
    var i, table, tr, td, s, currentSelected, y;
    table = document.getElementById("konsertTable");
    s = document.getElementById("scene");
    currentSelected = s.options[s.selectedIndex].text.toUpperCase();
    tr = table.getElementsByTagName("tr");
    for(i = 0;i < (tr.length); i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            y = td.innerHTML.toUpperCase();
            if (y == currentSelected) {
                tr[i].style.display = "";
            } else if (s.options[s.selectedIndex].value == 0) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function yearSort() {
    document.getElementById("searchField").value = "";
    document.getElementById("sjanger").selectedIndex = 0;
    document.getElementById("scene").selectedIndex = 0;
    var i, table, tr, td, s, currentSelected, y;
    table = document.getElementById("konsertTable");
    s = document.getElementById("year");
    currentSelected = s.options[s.selectedIndex].text.toUpperCase();
    newCur = currentSelected.slice(-2);
    tr = table.getElementsByTagName("tr");
    for(i = 0;i < (tr.length); i++) {
        td = tr[i].getElementsByTagName("td")[3];
        if (td) {
            y = td.innerHTML.toUpperCase();
            newY = y.slice(-2);
            if (newY == newCur) {
                tr[i].style.display = "";
            } else if (s.options[s.selectedIndex].value == 0) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}