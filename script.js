console.log("log")

function openServices(servicesName) {
    var i;
    var x = document.getElementsByClassName("services");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    document.getElementById(servicesName).style.display = "block";
  }