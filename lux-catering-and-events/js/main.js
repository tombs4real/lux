jQuery(document).ready(function ($) {


  //VARS
  var $window = $(window);
  var $body = $('body');
  var $site_header = $('.site-header');
  var $menu_item = $('.menu-item-has-children');
  var $page_curtain = $('.page-curtain');
  var $video_marquee = $('.lux-marquee-banner-video-container');
  var $home_content = $('.home .content');

  // For center align nav inject middle nav item
  var $third_menu_item = $('.header-center .site-header-nav > ul > li:nth-child(3)');
  $third_menu_item.after('<li class="empty-menu-item"></li>');

  // For each sub menu item get title and prepend to list
  $menu_item.each(function( i ) {
    var $this = $(this);
    var $menu_title = $this.find('a:first').text();
    var $sub_menu = $this.find('.sub-menu');
    
    $sub_menu.prepend('<li class="sub-menu-title">' + $menu_title + '</li>');
     
  });

  // Mobile Main Menu
  var $mobile_toggle_btn = $('#main_nav_mobile_toggle');
  var $mobile_close_btn = $('#main_nav_mobile_close');
  var $main_mobile_menu = $('#main-mobile-nav-container');

  $mobile_toggle_btn.on('click', function (e) {
    e.preventDefault();
    $page_curtain.toggleClass('open');
    $body.toggleClass('curtain-open');
    $main_mobile_menu.toggleClass('nav-open');
    $(this).toggleClass('nav-open');
  });

  $window.scroll(function(){
    var scrollTop = 60;
    if  ($(this).scrollTop() >= scrollTop ){
      $site_header.addClass('scroll');
    } else {
      $site_header.removeClass('scroll'); 
    }
  });

  // Footer Mobile Menus
  var $footer_menu_title = $('.footer-menu-title');
  $footer_menu_title.on('click', function (e) {
    e.preventDefault();
    var $this = $(this);
    $this.closest('.site-footer-menu').find('.footer-menu').toggleClass('active');
  });


  // PLANNER
  var $planner_tab = $('.lux-planner-tab');
  var tab_num = $planner_tab.length;
  var $planner_cards = $('.lux-planner-tab-card');
  var $planner_tab_btn_prev = $('.lux-planner-tab-nav .prev-planner-tab');
  var $planner_tab_btn_next = $('.lux-planner-tab-nav .next-planner-tab');
  var $progress = $('.lux-planner-tab-progress');
  var progress_width = 100 / tab_num;
  var current_tab = 1
  
  let planner = {
    "steps": {
      "01": [
        {
          "title": "What type of event are you planning?",
          "number": "1",
          "cards": [
            {"selection":"wedding", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"},
            {"selection":"celebration", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"},
            {"selection":"corporate", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"},
            {"selection":"non-profit", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"}
          ]
        }
      ],
      "02": [
        {
          "title": "Event Atmosphere | Describe your event's vibe.",
          "number": "2",
          "cards": [
            {"selection":"wedding", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"}
          ]
        }
      ],
      "03": [
        {
          "title": "The Vision | What's your ideal menu?",
          "number": "3",
          "cards": [
            {"selection":"wedding", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"}
          ]
        }
      ],
      "04": [
        {
          "title": "Taste & Preference: Pick three words for your desired culinary vibe.",
          "number": "4",
          "cards": [
            {"selection":"wedding", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"}
          ]
        }
      ],
      "05": [
        {
          "title": "What do you want guests to remember about the food?",
          "number": "5",
          "cards": [
            {"selection":"wedding", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"}
          ]
        }
      ],
      "06": [
        {
          "title": "What time of day is your event?",
          "number": "6",
          "cards": [
            {"selection":"wedding", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"}
          ]
        }
      ],
      "07": [
        {
          "title": "What type of service are you seeking?",
          "number": "7",
          "cards": [
            {"selection":"wedding", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"}
          ]
        }
      ],
      "08": [
        {
          "title": "Dietary Considerations: Any dietary focuses?",
          "number": "8",
          "cards": [
            {"selection":"wedding", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"}
          ]
        }
      ],
      "09": [
        {
          "title": "Guest Dynamics: Who are your guests?",
          "number": "9",
          "cards": [
            {"selection":"wedding", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"}
          ]
        }
      ],
      "10": [
        {
          "title": "What menu enhancements are you considering?",
          "number": "10",
          "cards": [
            {"selection":"wedding", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"}
          ]
        }
      ],
      "11": [
        {
          "title": "Are you looking for bar service?",
          "number": "11",
          "cards": [
            {"selection":"wedding", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"}
          ]
        }
      ],
      "12": [
        {
          "title": "Do you need Rentals?",
          "number": "12",
          "cards": [
            {"selection":"wedding", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"}
          ]
        }
      ],
      "13": [
        {
          "title": "Do you need florals?",
          "number": "13",
          "cards": [
            {"selection":"wedding", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"}
          ]
        }
      ],
      "14": [
        {
          "title": "Are you working with a wedding planner?",
          "number": "14",
          "cards": [
            {"selection":"wedding", "img":"https://lux-catering-events.local/wp-content/uploads/2024/01/blank_img.png"}
          ]
        }
      ],
    }
  };

  let num_of_steps = Object.keys(planner.steps).length;
  let first_step = planner.steps['01']
  let first_step_title = planner.steps['01'][0].title;
  let first_step_cards = planner.steps['01'][0].cards;


  let $planner_tab_cards_container = jQuery('.lux-planner-tab-cards');
  let $planner_tab_title = jQuery('.lux-planner-tab-title');
  let $planner_tab_step_num = jQuery('.lux-planner-tab-step');
  
  buildTab(first_step);
  buildCards(first_step_cards);


  function buildTab(obj) {
    let title = obj[0].title;
    let num = obj[0].number;
    let cards = obj[0].cards;
    let current_tab = num;
    let prev_tab = num - 1;
    let next_tab = num + 1;

    $planner_tab_title.html(title);
    $planner_tab_step_num.html(num + ' / ' + num_of_steps);
  }

  function buildCards(obj) {
    jQuery.each( obj, function( key, value ) {
      $planner_tab_cards_container.append(`
        <div class="lux-planner-tab-card" data-selection="`+ value.selection +`" style="background-image:url('`+ value.img +`');">
          <span>`+ value.selection +`</span>
        </div>
      `);
    });
  }

  $progress.width(progress_width + '%');

  $planner_cards.on('click', function (e) {
    e.preventDefault();
    var $this = $(this);
    $this.closest('.lux-planner-tab-cards').find('.lux-planner-tab-card').removeClass('checked');
    $this.addClass('checked');
  });

  $planner_tab_btn_next.on('click', function (e) {
    e.preventDefault();
    var $this = $(this);
    var $target = $('.lux-planner-tab.active').data('target');
    var $tab = '#planner_step' + $target;
    $planner_tab.removeClass('active');
    $($tab).addClass('active');
    checkCurrentTab($target);
  });

  $planner_tab_btn_prev.on('click', function (e) {
    e.preventDefault();
    var $this = $(this);
    var $target = $('.lux-planner-tab.active').data('target');
    var $prev_tab = $target - 2;
    var $tab = '#planner_step' + $prev_tab;
    $planner_tab.removeClass('active');
    $($tab).addClass('active');
    checkCurrentTab($prev_tab);
  });


  $(window).on('load resize', function() {

    $vm_height = $video_marquee.outerHeight();

    $home_content.css('padding-top', $vm_height);

    if ($(window).width()<960) {
      $site_header.removeClass('header-center');
    } else {
      $site_header.addClass('header-center');
    }
  });

  

  function checkCurrentTab(tab) {
    current_tab = tab
    if (current_tab > 1) {
      $planner_tab_btn_prev.css('display', 'inline-block');
    } else {
      $planner_tab_btn_prev.hide();
    }

    if (current_tab >= 3) {
      $planner_tab_btn_next.hide();
    } else {
      $planner_tab_btn_next.css('display', 'inline-block');
    }
    $progress.width(progress_width * tab + '%');
  }


});