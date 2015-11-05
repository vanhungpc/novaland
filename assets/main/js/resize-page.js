$(window).load(function() {
 // alert("123123");
 var w = document.documentElement.clientWidth;
  var h = document.documentElement.clientHeight;//window.innerHeight;
  var hHeader = $("header").height();
  var hFooter = $("footer").height();
  h = h - (hHeader + hFooter);
    //alert(h+'');
    $('<style type="text/css">#main-page {min-height:'+h+'px; } </style>').appendTo($('head'));
});
$( window ).resize(function() {
  var w = document.documentElement.clientWidth;
  var h = document.documentElement.clientHeight;//window.innerHeight;
  var hHeader = $("header").height();
  var hFooter = $("footer").height();
  var habc = h - (hHeader + hFooter);
  $('<style type="text/css">#main-page {min-height:'+habc+'px; } </style>').appendTo($('head'));

});