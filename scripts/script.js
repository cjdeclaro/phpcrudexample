function sayHello() {
  window.alert("Hello")
}

function turnOn() {
  let panel2 = document.getElementById("panel2");
  panel2.style.backgroundColor = "#777777";
  panel2.innerHTML = "hello";
}

function enableP() {
  let rPY = document.getElementById("rPregnantY");
  let rPN = document.getElementById("rPregnantN");

  rPY.disabled = false;
  rPN.disabled = false;

  console.log("en");
}

function disableP() {
  let rPY = document.getElementById("rPregnantY");
  let rPN = document.getElementById("rPregnantN");

  rPY.disabled = true;
  rPN.disabled = true;

  console.log("dis");
}