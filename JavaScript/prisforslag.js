document.getElementById("beregnPrisBtn").addEventListener("click", function(){
    var x = document.getElementById("scene");
    var plasser = x.options[x.selectedIndex].value;
    if ((plasser > 0)) {
        document.getElementById("anbefaltPris").innerHTML = "Velg scene!";

        var nullPris = (document.getElementById("konsertUtgifter").value / plasser);
        document.getElementById("anbefaltPris").innerHTML = "Billettpris: " + String(nullPris) + "NOK";
        document.getElementById("50pris").innerHTML = "Billettpris: " + String(nullPris)/0.5 + "NOK";
        document.getElementById("75pris").innerHTML = "Billettpris: " + String(nullPris)/0.75 + "NOK";
        document.getElementById("100pris").innerHTML = "Billettpris: " + String(nullPris) + "NOK";

        var onsketPris = (document.getElementById("konsertOverskudd").value / plasser) + nullPris;
        document.getElementById("anbefaltPris").innerHTML = "Billettpris: " + String(onsketPris) + "NOK";
        document.getElementById("50pris").innerHTML = "Billettpris: " + String(onsketPris)/0.5 + "NOK";
        document.getElementById("75pris").innerHTML = "Billettpris: " + String(onsketPris)/0.75 + "NOK";
        document.getElementById("100pris").innerHTML = "Billettpris: " + String(onsketPris) + "NOK";
    } else {
        document.getElementById("anbefaltPris").innerHTML = "Velg en scene!";
    }
});