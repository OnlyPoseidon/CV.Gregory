function openServices(servicesName) {
  var i;
  var x = document.getElementsByClassName("services");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(servicesName).style.display = "block";
}

var moveForce = 20; // max popup movement in pixels
var rotateForce = 10; // max popup rotation in deg

document.addEventListener("mousemove", function (e) {
  var docX = document.body.clientWidth;
  var docY = document.body.clientHeight;

  var moveX = (e.pageX - docX / 2) / (docX / 2) * -moveForce;
  var moveY = (e.pageY - docY / 2) / (docY / 2) * -moveForce;

  var rotateY = (e.pageX / docX * rotateForce * 2) - rotateForce;
  var rotateX = -((e.pageY / docY * rotateForce * 2) - rotateForce);

  document.getElementById('popup').style.left = moveX + 'px';
  document.getElementById('popup').style.top = moveY + 'px';
  document.getElementById('popup').style.transform = 'rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg)';
});