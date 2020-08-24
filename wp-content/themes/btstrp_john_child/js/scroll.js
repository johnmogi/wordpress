window.onscroll = function() { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("masthead").style.height = "60px";
        document.getElementById("top-menu").style.height = "60px";
        document.getElementById("logo").style.width = "120px";
        document.getElementById("toggletop").style.top = "0px";

    //     $('#navbar-collapsed-1').style.transform =  "translateY(70px)";
     document.getElementById("navbar-collapsed-1").style.transform = "translateY(70px)";


        document.getElementById("logo").style.width = "80px";
        //  document.getElementById("wpadminbar").style.display = "none";
    } else {
        document.getElementById("masthead").style.height = "100px";
        document.getElementById("top-menu").style.height = "100px";
        // $('#navbar-collapsed-1').style.transform =  "translateY(110px)";
       document.getElementById("navbar-collapsed-1").style.transform = "translateY(110px)";
       document.getElementById("toggletop").style.top = "28px";

        document.getElementById("logo").style.width = "170px";
        //   document.getElementById("wpadminbar").style.display = "block";


    }
}

// $(".project-card").hover(function() {
//     $(this).css("color", "#000");
// }, function() {
//     $(this).css("background", "transparent");
// });
$(".layer").hover(function() {
    $(this).css("background", "#fff8");
    $(this).css("color", "#000");
}, function() {
    $(this).css("background", "transparent");
    $(this).css("color", "transparent");
});

$(".navbar-toggler").click(function() {
    if ($('.navbar-collapsed:visible').length)
        $('.navbar-collapsed').hide("slide", { direction: "right" }, 1000);
    else
        $('.navbar-collapsed').show("slide", { direction: "right" }, 1000);
});