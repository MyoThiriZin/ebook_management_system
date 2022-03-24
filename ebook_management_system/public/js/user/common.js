$(document).ready(function () {
  $(function () {
      $('.btn-gnavi').on('click', function () {
          var leftVal = 0;
          if ($(this).hasClass('hb-open')) {
              leftVal = -768;
              $(this).removeClass('hb-open');
          } else {
              $(this).addClass('hb-open');
          }

          $('.sidenav').stop().animate({
              left: leftVal
          }, 200);
      });
  });

//  $(window).resize(checkWidth);
//
//  function checkWidth() {
//      if ($(window).width() > 767) {
//          $(".sidenav").css("left", "0");
//      } else if ($(window).width() <= 767) {
//          $(".sidenav").css("left", "");
//      };
//  }
});