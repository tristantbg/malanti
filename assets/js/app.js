/* globals $:false */
var width = $(window).width(),
    height = $(window).height(),
    iscrollOptions = {
        scrollbars: true,
        mouseWheel: true,
        hideScrollbars: false,
        fadeScrollbars: false,
        disableMouse: true,
        interactiveScrollbars: true
    },
    intro = true,
    isMobile = false,
    $slider = false,
    State = {},
    flkty,
    $root = '/oisin';
$(function() {
    var app = {
        init: function() {
            $(window).resize(function(event) {});
            $(window).scroll(function(event) {
                if (intro) {
                    app.hideIntro();
                }
            });
            $(document).ready(function($) {
                $body = $('body');
                $container = $('#container');
                app.sizeSet();
                app.loadSlider();
                $('body').on('click', '[data-target]', function(e) {
                    e.preventDefault();
                    $el = $(this);
                    State.url = $el.attr('href');
                    State.target = $el.data('target');
                    if (State.target == "page-left") {
                        app.loadContent(State.url, $('#container-left'));
                        // History.pushState({
                        //     type: 'project'
                        // }, $el.data('title') + " | " + $sitetitle, $el.attr('href'));
                    } else if (State.target == "page-right") {
                        app.loadContent(State.url, $('#container-right'));
                        // History.pushState({
                        //     type: 'project'
                        // }, $el.data('title') + " | " + $sitetitle, $el.attr('href'));
                    } else {
                        e.preventDefault();
                        app.goIndex();
                    }
                });
                $body.on('click', 'section', function(event) {
                  $(this).find('.drawer').slideToggle(600);
                });
                $('#intro').click(function(event) {
                    event.preventDefault();
                    app.hideIntro();
                });
                document.addEventListener('lazybeforeunveil', function(e) {
                  if ($slider) {
                    $.fn.fullpage.reBuild();
                  }
                });
                $(document).keyup(function(e) {
                    if (e.keyCode === 27) app.goIndex();
                    if (e.keyCode === 37 && $slider) app.goPrev($slider);
                    if (e.keyCode === 39 && $slider) {
                        if (app.checkLastCell(flkty)) {
                            app.nextProject();
                        } else {
                            app.goNext($slider);
                        }
                    }
                });
                $(window).load(function() {
                    $('#loader').fadeOut();
                });
            });
        },
        sizeSet: function() {
            width = $(window).width();
            height = $(window).height();
            if (width <= 770) isMobile = true;
            if (isMobile) {
                if (width >= 770) {
                    isMobile = false;
                }
            }
        },
        hideIntro: function() {
            intro = false;
            $body.addClass('intro-hidden');
            setTimeout(function() {
                $('#intro').remove();
            }, 1600);
        },
        checkLastCell: function(flkty) {
            if (flkty.selectedIndex < flkty.cells.length - 1) {
                return false;
            } else {
                return true;
            }
        },
        nextProject: function() {
            var $selected = $(".project-link.active");
            var links = $('.project-link');
            $activeCat = links.eq((links.index($selected) + 1) % links.length).find('a').trigger('click');
        },
        loadSlider: function() {
            $slider = $('#slider').fullpage({
                //Navigation
                menu: '#projects-menu',
                lockAnchors: false,
                anchors: ['work'],
                navigation: false,
                //Scrolling
                css3: true,
                scrollingSpeed: 700,
                autoScrolling: true,
                fitToSection: true,
                fitToSectionDelay: 1000,
                scrollBar: false,
                easing: 'easeInOutCubic',
                easingcss3: 'ease',
                loopHorizontal: false,
                continuousVertical: false,
                continuousHorizontal: false,
                scrollOverflow: true,
                scrollOverflowReset: false,
                //Design
                controlArrows: false,
                //Custom selectors
                sectionSelector: '.section',
                slideSelector: '.project',
                lazyLoading: false,
                //events
                onLeave: function(index, nextIndex, direction) {
                },
                afterLoad: function(anchorLink, index) {
                    $('#projects-menu').find('li').eq(index - 1).addClass('active');
                },
                afterRender: function() {},
                afterResize: function() {},
                afterResponsive: function(isResponsive) {},
                afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex) {},
                onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex) {
                    $('#projects-menu').find('li.active').removeClass('active');
                    $('#projects-menu').find('li').eq(nextSlideIndex).addClass('active');
                }
            });
        },
        goNext: function($slider) {
            $slider.flickity('next', false);
        },
        goPrev: function($slider) {
            $slider.flickity('previous', false);
        },
        goIndex: function() {
            $body.removeClass('page page-right page-left');
            // History.pushState({
            //     type: 'index'
            // }, $sitetitle, window.location.origin + $root);
        },
        loadContent: function(url, target) {
            $body.removeClass('loaded').addClass('loading');
                $body.scrollTop(0);
                $(target).load(url + ' #container .inner', function(response) {
                    setTimeout(function() {
                      if (State.target == 'page-left') {
                        $body.addClass('page page-left');
                        leftScroll = new IScroll('#container-left', iscrollOptions);
                      }
                      else if (State.target == 'page-right') {
                        $body.addClass('page page-right');
                        rightScroll = new IScroll('#container-right .scroller', iscrollOptions);
                      }
                        $body.removeClass('loading').addClass('loaded');
                    }, 100);
                });
        },
        deferImages: function() {
            var imgDefer = document.getElementsByTagName('img');
            for (var i = 0; i < imgDefer.length; i++) {
                if (imgDefer[i].getAttribute('data-src')) {
                    imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-src'));
                }
            }
        }
    };
    app.init();
});