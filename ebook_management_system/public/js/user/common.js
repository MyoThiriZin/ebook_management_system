$(document).ready(function () {
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