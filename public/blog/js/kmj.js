var navbarButton = document.getElementById("openBtn");
var closeButton = document.getElementById("closeBtn");
var sidepanel = document.getElementById("sidebar");

let vh = window.innerHeight * 0.01;
const navbar = document.getElementsByClassName("navbar");

document.documentElement.style.setProperty("--vh", `${vh}px`);

// SLEEP FUNCTION
function sleep(milliseconds) {
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < milliseconds);
}

function openTab(evt, content) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("nav-link");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(content).style.display = "flex";
  evt.currentTarget.className += " active";
}

// SCROLLING EFFECT for NAVBAR
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("nav").classList.add("active");
  } else {
    document.getElementById("nav").classList.remove("active");
  }
}

// SIDEPANEL
let navStat = false;
navbarButton.addEventListener("click", () => {
  if (!navStat) {
    sidepanel.classList.add("open");
    // navbarButton.classList.add("open");
    navStat = true;
  } else {
    sidepanel.classList.remove("open");
    // navbarButton.classList.remove("open");
    navStat = false;
  }
});
closeButton.addEventListener("click", () => {
  if (!navStat) {
    sidepanel.classList.add("open");
    // navbarButton.classList.add("open");
    navStat = true;
  } else {
    sidepanel.classList.remove("open");
    // navbarButton.classList.remove("open");
    navStat = false;
  }
});

// NEW STUFF
var dataLiveInput = document.querySelectorAll(".data-live input");
var dataLiveOption = document.querySelectorAll(".data-live ul");
var dataLiveText = document.querySelectorAll(".data-live ul li");
let dataLiveCount, dataLiveInputCount;

// OPTION INPUT
for (dataLiveCount = 0; dataLiveCount < dataLiveText.length; dataLiveCount++) {
  // Adding 'CLICK' function to 'data-option'
  dataLiveText[dataLiveCount].addEventListener("click", function () {
    // Determine value of 'data-option'
    var dataText = this.innerHTML;
    // Put value of 'data-option' into input tag
    this.parentElement.parentElement.children[0].value = dataText;
  });
}

// FILTER
for (
  dataLiveInputCount = 0;
  dataLiveInputCount < dataLiveInput.length;
  dataLiveInputCount++
) {
  dataLiveInput[dataLiveInputCount].addEventListener("keyup", function () {
    for (var i = 0; i < dataLiveText.length; i++) {
      if (
        this.parentElement
          .getElementsByTagName("li")
          [i].innerText.toUpperCase()
          .indexOf(this.value.toUpperCase()) > -1
      ) {
        dataLiveText[i].style.display = "";
      } else {
        dataLiveText[i].style.display = "none";
      }
    }
  });
  // Data Show when Input Clicked
  dataLiveInput[dataLiveInputCount].addEventListener("focusin", function () {
    this.parentElement.children[1].classList.add("show-data");
  });
  // Data Hide when Input Clicked
  dataLiveInput[dataLiveInputCount].addEventListener("focusout", function () {
    this.parentElement.children[1].classList.remove("show-data");
  });
}
