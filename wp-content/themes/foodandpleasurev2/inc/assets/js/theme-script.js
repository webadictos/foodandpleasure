jQuery(function ($) {
  'use strict';
  // here for each comment reply link of WordPress
  $('.comment-reply-link').addClass('btn btn-primary');

  // here for the submit button of the comment reply form
  $('#commentsubmit').addClass('btn btn-primary');

  // The WordPress Default Widgets
  // Now we'll add some classes for the WordPress default widgets - let's go

  // the search widget
  $('.widget_search input.search-field').addClass('form-control');
  $('.widget_search input.search-submit').addClass('btn btn-default');
  $('.variations_form .variations .value > select').addClass('form-control');
  $('.widget_rss ul').addClass('media-list');

  $(
    '.widget_meta ul, .widget_recent_entries ul, .widget_archive ul, .widget_categories ul, .widget_nav_menu ul, .widget_pages ul, .widget_product_categories ul'
  ).addClass('nav flex-column');
  $(
    '.widget_meta ul li, .widget_recent_entries ul li, .widget_archive ul li, .widget_categories ul li, .widget_nav_menu ul li, .widget_pages ul li, .widget_product_categories ul li'
  ).addClass('nav-item');
  $(
    '.widget_meta ul li a, .widget_recent_entries ul li a, .widget_archive ul li a, .widget_categories ul li a, .widget_nav_menu ul li a, .widget_pages ul li a, .widget_product_categories ul li a'
  ).addClass('nav-link');

  $('.widget_recent_comments ul#recentcomments')
    .css('list-style', 'none')
    .css('padding-left', '0');
  $('.widget_recent_comments ul#recentcomments li').css('padding', '5px 15px');

  $('table#wp-calendar').addClass('table table-striped');

  // Adding Class to contact form 7 form
  $('.wpcf7-form-control')
    .not('.wpcf7-submit, .wpcf7-acceptance, .wpcf7-file, .wpcf7-radio')
    .addClass('form-control');
  $('.wpcf7-submit').addClass('btn btn-primary');

  // Adding Class to Woocommerce form
  $(
    '.woocommerce-Input--text, .woocommerce-Input--email, .woocommerce-Input--password'
  ).addClass('form-control');
  $('.woocommerce-Button.button')
    .addClass('btn btn-primary mt-2')
    .removeClass('button');

  $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function (event) {
    event.preventDefault();
    event.stopPropagation();
    $(this).parent().siblings().removeClass('open');
    $(this).parent().toggleClass('open');
  });

  // Fix woocommerce checkout layout
  $('#customer_details .col-1').addClass('col-12').removeClass('col-1');
  $('#customer_details .col-2').addClass('col-12').removeClass('col-2');
  $('.woocommerce-MyAccount-content .col-1')
    .addClass('col-12')
    .removeClass('col-1');
  $('.woocommerce-MyAccount-content .col-2')
    .addClass('col-12')
    .removeClass('col-2');

  // Add Option to add Fullwidth Section
  function fullWidthSection() {
    var screenWidth = $(window).width();
    if ($('.entry-content').length) {
      var leftoffset = $('.entry-content').offset().left;
    } else {
      var leftoffset = 0;
    }
    $('.full-bleed-section').css({
      position: 'relative',
      left: '-' + leftoffset + 'px',
      'box-sizing': 'border-box',
      width: screenWidth,
    });
  }
  fullWidthSection();
  $(window).resize(function () {
    fullWidthSection();
  });

  // Allow smooth scroll
  $('.page-scroller').on('click', function (e) {
    e.preventDefault();
    var target = this.hash;
    var $target = $(target);
    $('html, body').animate(
      {
        scrollTop: $target.offset().top,
      },
      1000,
      'swing'
    );
  });

  function toggleDropdown(e) {
    const _d = $(e.target).closest('.dropdown'),
      _m = $('.dropdown-menu', _d);
    setTimeout(
      function () {
        const shouldOpen = e.type !== 'click' && _d.is(':hover');
        _m.toggleClass('show', shouldOpen);
        _d.toggleClass('show', shouldOpen);
        $('[data-toggle="dropdown"]', _d).attr('aria-expanded', shouldOpen);
      },
      e.type === 'mouseleave' ? 5 : 0
    );
  }

  $('body')
    .on(
      'mouseenter mouseleave',
      '.dropdown:not("#main-left-nav .dropdown")',
      toggleDropdown
    )
    .on('click', ".dropdown-menu a:not('.dropdown-item')", toggleDropdown);

  $('.dropdown a:not("#main-left-nav .dropdown a")')
    .not('.dropdown-item')
    .on('click tap', function (event) {
      event.preventDefault();
      // console.log("Was preventDefault() called: " + event.isDefaultPrevented());
      if ($(window).width() > 991 && $(this).attr('href') != '#') {
        window.location.href = $(this).attr('href');
      }
      //console.log($(window).width());
    });

  $(function () {
    $('a[href="#search"]').on('click', function (event) {
      event.preventDefault();
      $('#search').addClass('open');
      $('#searchoverlay').val('');
      $('#searchoverlay').focus();
    });
    $('a[href="#menubar-toggler"]').on('click', function (event) {
      event.preventDefault();
      $('#menubar').addClass('open');
    });

    $('.food-overlay, .food-overlay button.close').on(
      'click keyup',
      function (event) {
        if (
          event.target == this ||
          event.target.className == 'close' ||
          event.keyCode == 27
        ) {
          $(this).removeClass('open');
        }
      }
    );
  });

  $(window).scroll(function () {
    if ($(this).scrollTop() > $('#masthead').outerHeight(true)) {
      //$('.sticky-header').css("top",($('#masthead').outerHeight(true)));
    }
  });
  //Refresh

  $(function () {
    if (top == self) {
      var timer, waRefresh;

      var page = window.location.href;
      var thCounter = window.sessionStorage.getItem(
        'thCounter_' + window.postID
      );
      var videoSelectors = [
        'iframe[src*="player.vimeo.com"]',
        'iframe[src*="youtube.com"]',
        'iframe[src*="youtube-nocookie.com"]',
        'iframe[src*="kickstarter.com"][src*="video.html"]',
        'object',
        'embed',
      ];

      if (thCounter === null) {
        thCounter = 0;
      }

      var videosDelPost = $(document).find(videoSelectors.join(','));

      thCounter++;
      window.sessionStorage.setItem('thCounter_' + window.postID, thCounter);

      function resetTimer() {
        if (timer) {
          window.clearTimeout(timer);
        }
        timer = window.setTimeout(thRefresh, 50000);
        console.log('Reiniciando Timer...');
      }

      var thRefresh = function () {
        resetTimer();
        if (window.canRefresh) {
          if (thCounter < 10 && top == self) {
            location.href = window.location.href;
          }
        } else {
        }
      };
      resetTimer();
      $(document.body).on('mousemove keydown', resetTimer);
      $(window).on('scroll', resetTimer);
    }
  });
});
