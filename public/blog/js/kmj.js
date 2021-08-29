var navbarButton = document.getElementById("openBtn");
var closeButton = document.getElementById("closeBtn");
var sidepanel = document.getElementById("sidebar");

let vh = window.innerHeight * 0.01;
const navbar = document.getElementsByClassName("navbar");

document.documentElement.style.setProperty("--vh", `${vh}px`);

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
    var sum = this.parentElement.children[1].children;
    var result = this.value.toUpperCase();
    for (
      var i = 0;
      i < this.parentElement.getElementsByTagName("li").length;
      i++
    ) {
      if (sum[i].innerText.toUpperCase().indexOf(result) > -1) {
        sum[i].style.display = "";
      } else {
        sum[i].style.display = "none";
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

// BETA
// SELECT/OPTION-LIVE-SEARCH
// =========================
var x, i, j, l, ll, selElmnt, a, b, c;
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.setAttribute("tabindex", "1");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  var inputselect = document.createElement("input");
  inputselect.setAttribute("type", "text");
  inputselect.setAttribute("placeholder", "Cari...");
  // inputselect.setAttribute("tabindex", "1");
  b.appendChild(inputselect);
  // ================================ //
  // ================================ //
  // ================================ //
  //          IF KATE DIRUBAH         //
  // ================================ //
  // ================================ //
  // ================================ //
  for (j = 1; j < ll; j++) {
    // j=1 ganti nang j=0
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function (e) {
      var y, i, k, s, h, sl, yl;
      s = this.parentNode.parentNode.getElementsByTagName("select")[0];
      sl = s.length;
      h = this.parentNode.previousSibling;
      for (i = 0; i < sl; i++) {
        if (s.options[i].innerHTML == this.innerHTML) {
          s.selectedIndex = i;
          h.innerHTML = this.innerHTML;
          y = this.parentNode.getElementsByClassName("same-as-selected");
          yl = y.length;
          for (k = 0; k < yl; k++) {
            y[k].removeAttribute("class");
          }
          this.setAttribute("class", "same-as-selected");
          break;
        }
      }
      h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("focusin", function (e) {
    this.nextSibling.firstChild.focus();
    this.nextSibling.classList.remove("select-hide");
  });
  inputselect.addEventListener("focusout", function (e) {
    this.parentElement.classList.add("select-hide");
    // this.value = "";
  });
  var list = b.children;
  var result = b.firstChild.value.toUpperCase();
  for (let p = 1; p < b.childElementCount; p++) {
    b.firstChild.addEventListener("keyup", function () {
      var res = this.parentElement.firstChild.value
        .replace(" ", "")
        .toUpperCase();
      if (
        this.parentElement.children[p].innerText
          .replace(" ", "")
          .toUpperCase()
          .indexOf(res) > -1
      ) {
        this.parentElement.children[p].style.display = "";
      } else {
        this.parentElement.children[p].style.display = "none";
      }
      if (sum[i].innerText.toUpperCase().indexOf(result) > -1) {
        sum[i].style.display = "";
      } else {
        sum[i].style.display = "none";
      }
    });
    // inputselect.addEventListener("focusout", function () {
    //   this.parentElement.children[p].style.display = "";
    // });
  }
}

var inputselect = document.createElement("input");

function closeAllSelect(elmnt) {
  var x,
    y,
    i,
    xl,
    yl,
    arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i);
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

// SECTIONING SETTING
if (document.querySelectorAll("#priceTab").length > 0) {
  document.getElementById("Bayar").style.display = "";
  document.getElementById("Lacak").style.display = "none";
  document.getElementById("Lokasi").style.display = "none";
  document.getElementsByClassName("nav-link")[0].classList.add("active");
  document.getElementsByClassName("nav-link")[1].classList.remove("active");
  document.getElementsByClassName("nav-link")[2].classList.remove("active");
  var topPriceTab = document.getElementById("priceTab").offsetTop;
  var heightPriceTab = document.getElementById("priceTab").offsetHeight;
  document.documentElement.scrollTo({ top: heightPriceTab + topPriceTab + 50 });
}
if (document.querySelectorAll("#resultTab").length > 0) {
  document.getElementById("Bayar").style.display = "none";
  document.getElementById("Lacak").style.display = "";
  document.getElementById("Lokasi").style.display = "none";
  document.getElementsByClassName("nav-link")[0].classList.remove("active");
  document.getElementsByClassName("nav-link")[1].classList.add("active");
  document.getElementsByClassName("nav-link")[2].classList.remove("active");
  var topResultTab = document.getElementById("resultTab").offsetTop;
  var heightResultTab = document.getElementById("resultTab").offsetHeight;
  document.documentElement.scrollTo({
    top: heightResultTab + topResultTab,
  });
}
