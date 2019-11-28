(function ($) {
    "use strict"; // Start of use strict

    $('#tampil-sandi').click(function () {
      if ($(this).is(':checked')) {
        $('.tampil-sandi').attr('type', 'text');
      } else {
        $('.tampil-sandi').attr('type', 'password');
      }
    });

    /* SCRIPT UNTUK MENGHILANGKAN ALERT SECARA OTOMATIS SELAMA 2 DETIK */

    $("#alert-login").fadeTo(2000, 500).slideUp(500, function () {
      $("#alert-login").slideUp(500);
      history.pushState(null, null, window.location.href.split('#')[0]);
      window.location.hash = '';
    });

    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: (target.offset().top - 54)
          }, 1000, "easeInOutExpo");
          return false;
        }
      }
    });

    // Closes responsive menu when a scroll trigger link is clicked
    $('.js-scroll-trigger').click(function () {
      $('.navbar-collapse').collapse('hide');
    });

    // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
      target: '#mainNav',
      offset: 56
    });

    // Collapse Navbar
    var navbarCollapse = function () {
      if ($("#mainNav").offset().top > 100) {
        $("#mainNav").addClass("navbar-shrink");
      } else {
        $("#mainNav").removeClass("navbar-shrink");
      }
    };
    // Collapse now if page is not at top
    navbarCollapse();
    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);


    var Mtr = '';
    var Count = 0;
    var LinkMtr = '';
    var IdMtr = '';
    $("#select_mitra").change(function () {
      $(this).find("option:selected").each(function () {
        Mtr = $(this).attr("placeholder");
        IdMtr = $(this).attr("value");
        Count = parseInt($(this).attr("count"));
        LinkMtr = "upload_file_print.php?id_mitra=" + IdMtr;

        var DisCount = Count * 10 ;
        $("#iframe").prop('src', Mtr);
        $("#link_mitra").prop('href', LinkMtr);
        document.getElementById("estimasi").innerHTML = DisCount + " Menit";
      });
    }).change();

    })(jQuery); // End of use strict