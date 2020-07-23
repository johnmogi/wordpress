window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("masthead").style.height = "60px";
    document.getElementById("logo").style.width = "100px";
  } else {
    document.getElementById("masthead").style.height = "100px";
    document.getElementById("logo").style.width = "200px";
  } 
}