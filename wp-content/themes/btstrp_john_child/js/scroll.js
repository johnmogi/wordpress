window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("masthead").style.height = "60px";
    document.getElementById("logo").style.width = "100px";
    document.getElementById("wpadminbar").style.display = "none";
  } else {
    document.getElementById("masthead").style.height = "100px";
    document.getElementById("logo").style.width = "200px";
    document.getElementById("wpadminbar").style.display = "block";

  
  } 
}