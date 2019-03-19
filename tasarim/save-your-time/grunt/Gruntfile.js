module.exports = function(grunt){

    require('load-grunt-tasks')(grunt);

    grunt.initConfig({   

        // MINIFY & COMBINE JS
        uglify: {
          options: {
              mangle: false // rename variable or not 
          },
          dist: {
              files: {
                  '../../assets/js/min/min.js': [
                  '../../assets/js/libs/jquery/dist/jquery.min.js', 
                  '../../assets/js/libs/jquery-ui/jquery-ui.min.js', 
                  '../../assets/js/libs/gsap/src/minified/TweenMax.min.js',
                  '../../assets/js/libs/gsap/src/minified/plugins/ScrollToPlugin.min.js',
                  '../../assets/js/libs/tether/dist/js/tether.min.js',
                  '../../assets/js/libs/bootstrap/dist/js/bootstrap.min.js',
                  '../../assets/js/libs/superfish/dist/js/superfish.min.js',
                  '../../assets/js/libs/appear/jquery.appear.js',
                  '../../assets/js/libs/jquery.scrollspeed/jQuery.scrollSpeed.js',
                  '../../assets/js/libs/jquery-backstretch/src/jquery.backstretch.js',
                  '../../assets/js/libs/skrollr/dist/skrollr.min.js',
                  '../../assets/js/libs/bootstrap-validator/dist/validator.min.js',
                  '../../assets/js/libs/select2/dist/js/select2.full.min.js',
                  '../../assets/js/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.js',
                  '../../assets/js/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
                  '../../assets/js/libs/bootpag/lib/jquery.bootpag.min.js',
                  '../../assets/js/libs/highlightjs/highlight.pack.min.js',
                  '../../assets/js/libs/jquery-countTo/jquery.countTo.js',
                  '../../assets/js/libs/jquery.countdown/dist/jquery.countdown.min.js',
                  '../../assets/js/libs/easyticker-jquery/jquery.easy-ticker.min.js',
                  '../../assets/js/libs/jquery.fitvids/jquery.fitvids.js',
                  '../../assets/js/libs/video.js/dist/video-js/video.js',
                  '../../assets/js/libs/raty/lib/jquery.raty.js',
                  '../../assets/js/libs/toastr/toastr.min.js',
                  '../../assets/js/blast.js',
                  '../../assets/js/jquery-parallax-scroll.js',
                  '../../assets/js/libs/easyzoom/dist/easyzoom.js',
                  '../../assets/js/libs/isotope/dist/isotope.pkgd.min.js',
                  '../../assets/js/libs/isotope-packery/packery-mode.pkgd.min.js',
                  '../../assets/js/libs/fullpage.js/dist/jquery.fullpage.min.js',
                  '../../assets/js/libs/slimScroll/jquery.slimscroll.min.js',
                  '../../assets/js/plugins/portfolio-ajax/js/jquery.colio.min.js',
                  '../../assets/js/libs/moment/moment.js',
                  '../../assets/js/libs/fullcalendar/dist/fullcalendar.min.js',
                  '../../assets/js/libs/owl.carousel/dist/owl.carousel.min.js',
                  '../../assets/js/libs/flexslider/jquery.flexslider-min.js',
                  '../../assets/js/libs/bxslider-4/dist/jquery.bxslider.min.js',
                  '../../assets/js/libs/accordion-slider/jquery.accordionSlider.min.js',
                  '../../assets/js/libs/slick-carousel/slick/slick.min.js',
                  '../../assets/js/libs/magnific-popup/dist/jquery.magnific-popup.min.js',
                  '../../assets/js/plugins/slick-modal/jquery.slick-modals.min.js',
                  '../../assets/js/plugins/revolution-slider/revolution/js/jquery.themepunch.tools.min.js',
                  '../../assets/js/plugins/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js',
                  '../../assets/js/plugins/revolution-slider/revolution/js/extensions/revolution.extension.slideanims.min.js',
                  '../../assets/js/plugins/revolution-slider/revolution/js/extensions/revolution.extension.layeranimation.min.js',
                  '../../assets/js/plugins/revolution-slider/revolution/js/extensions/revolution.extension.kenburn.min.js',
                  '../../assets/js/plugins/revolution-slider/revolution/js/extensions/revolution.extension.navigation.min.js',
                  '../../assets/js/plugins/revolution-slider/revolution/js/extensions/revolution.extension.parallax.min.js',
                  '../../assets/js/libs/jflickrfeed/jflickrfeed.min.js',
                  '../../assets/js/libs/jribbble/dist/jribbble.min.js',
                  '../../assets/js/libs/Chart.js/Chart.min.js',
                  '../../assets/js/libs/jquery-knob/dist/jquery.knob.min.js',
                  '../../assets/js/libs/bootstrap-select/dist/js/bootstrap-select.js',
                  '../../assets/js/libs/velocity/velocity.js',
                  '../../assets/js/libs/velocity/velocity.ui.min.js',
                  '../../assets/js/libs/jQuery-One-Page-Nav/jquery.nav.js',
                  '../../assets/js/libs/multiscroll.js/jquery.multiscroll.min.js',
                  '../../assets/js/plugins/slick-modal/jquery.slick-modals.min.js',
                  '../../assets/js/blog.js',
                  '../../assets/js/charts.js',
                  '../../assets/js/ecommerce.js',
                  '../../assets/js/map.js',
                  '../../assets/js/masonry.js',
                  '../../assets/js/navigation.js',
                  '../../assets/js/overview.js',
                  '../../assets/js/portfolio.js',
                  '../../assets/js/portfolio_builder.js',
                  '../../assets/js/search.js',
                  '../../assets/js/text_animation.js',
                  '../../assets/js/restaurant.js',
                  '../../assets/js/builder.js',
                  '../../assets/js/sliders.js',
                  '../../assets/js/main.js',
                  '../../assets/js/widgets.js',
                  '../../assets/js/contact.js']
              }
          }
        },
        
        // MINIFY & COMBINE CSS
        cssmin: {
          options: {
              shorthandCompacting: false,
              roundingPrecision: -1
          },
          target: {
              files: {
                  '../../assets/css/min/min.css': [
                  '../../assets/js/libs/font-awesome/css/font-awesome.min.css', 
                  '../../assets/js/libs/bootstrap/dist/css/bootstrap.min.css', 
                  '../../assets/css/icons/nucleo.css',
                  '../../assets/js/libs/tether/dist/css/tether.min.css',
                  '../../assets/js/libs/flexslider/flexslider.css',
                  '../../assets/js/libs/owl.carousel/dist/assets/owl.carousel.css',
                  '../../assets/js/libs/owl.carousel/dist/assets/owl.theme.default.min.css',
                  '../../assets/js/libs/bxslider-4/dist/jquery.bxslider.min.css',
                  '../../assets/js/libs/accordion-slider/accordion-slider.min.css',
                  '../../assets/js/libs/slick-carousel/slick/slick.css',
                  '../../assets/js/plugins/revolution-slider/revolution/css/settings.css',
                  '../../assets/js/plugins/revolution-slider/revolution/css/navigation.css',
                  '../../assets/js/libs/magnific-popup/dist/magnific-popup.css',
                  '../../assets/js/libs/video.js/dist/video-js/video-js.min.css',
                  '../../assets/js/libs/videojs-sublime-skin/dist/videojs-sublime-skin.min.css',
                  '../../assets/js/libs/select2/dist/css/select2.min.css',
                  '../../assets/js/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.css',
                  '../../assets/js/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css',
                  '../../assets/js/libs/animate.css/animate.min.css',
                  '../../assets/js/libs/highlightjs/styles/solarized_dark.css',
                  '../../assets/js/libs/toastr/toastr.min.css',
                  '../../assets/js/libs/fullcalendar/dist/fullcalendar.min.css',
                  '../../assets/js/plugins/slick-modal/sm-minified.css',
                  '../../assets/css/colors.css', 
                  '../../assets/css/footers.css',
                  '../../assets/css/form.css',
                  '../../assets/css/blog.css',
                  '../../assets/css/events.css',
                  '../../assets/css/builder.css',
                  '../../assets/css/overview.css',
                  '../../assets/css/buttons.css',
                  '../../assets/css/main.css', 
                  '../../assets/css/masonry.css',
                  '../../assets/css/nav.css', 
                  '../../assets/css/hover-effects.css',
                  '../../assets/css/ecommerce.css',
                  '../../assets/css/portfolio.css',
                  '../../assets/css/preloader.css',
                  '../../assets/css/pricing-tables.css',
                  '../../assets/css/team.css',
                  '../../assets/css/text-animation.css',
                  '../../assets/css/pages.css',
                  '../../assets/css/sliders.css',
                  '../../assets/css/themes.css',
                  '../../assets/css/ui.css',
                  '../../assets/css/widgets.css',
                  '../../assets/css/restaurant.css']
              }
          }
        },

        // REPLACE TEXT & FILE PATHS 
        replace: {
            dist: {
                src: ['../../assets/css/min/min.css'],
                overwrite: true,                 // overwrite matched source files 
                replacements: [{
                    from: "assets/img/",
                    to: "assets/img/min/"
                },{
                    from: "../img/form",
                    to: "../../img/form"
                },{
                    from: "../fonts/fontawesome",
                    to: "../../js/libs/font-awesome/fonts/fontawesome"
                },{
                    from: "../fonts/revicons",
                    to: "../../js/plugins/revolution-slider/revolution/fonts/revicons"
                },{
                    from: "../img/gradient",
                    to: "../../img/gradient"
                },{
                    from: "outline/",
                    to: "../icons/outline/"
                },{
                    from: "glyph/",
                    to: "../icons/glyph/"
                },{
                    from: "images/bx_loader.gif",
                    to: "../../js/libs/bxslider-4/dist/images/bx_loader.gif"
                },{
                    from: "openhand.cur",
                    to: "../../js/plugins/revolution-slider/revolution/css/openhand.cur"
                },{
                    from: "closedhand.cur",
                    to: "../../js/plugins/revolution-slider/revolution/css/closedhand.cur"
                },{
                    from: "../img/bg/pattern/3.png",
                    to: "../../img/bg/pattern/3.png"
                },{
                    from: "../img/various/down.png",
                    to: "../../img/various/down.png"
                },{
                    from: "../img/nature/full-42.jpg",
                    to: "../../img/nature/full-42.jpg"
                },{
                    from: "../img/various/clouds.png",
                    to: "../../img/various/clouds.png"
                },{
                    from: "fonts/flexslider-icon",
                    to: "../../js/libs/flexslider/fonts/flexslider-icon"
                }]
            }
        },

        // EXECUTE TASKS AUTOMATICALLY ON CHANGE
        watch: {
            js: {
                files:[
                  '../../assets/js/libs/jquery/dist/jquery.min.js', 
                  '../../assets/js/libs/jquery-ui/jquery-ui.min.js', 
                  '../../assets/js/libs/gsap/src/minified/TweenMax.min.js',
                  '../../assets/js/libs/gsap/src/minified/plugins/ScrollToPlugin.min.js',
                  '../../assets/js/libs/tether/dist/js/tether.min.js',
                  '../../assets/js/libs/bootstrap/dist/js/bootstrap.min.js',
                  '../../assets/js/libs/superfish/dist/js/superfish.min.js',
                  '../../assets/js/libs/appear/jquery.appear.js',
                  '../../assets/js/libs/jquery.scrollspeed/jQuery.scrollSpeed.js',
                  '../../assets/js/libs/jquery-backstretch/src/jquery.backstretch.js',
                  '../../assets/js/libs/skrollr/dist/skrollr.min.js',
                  '../../assets/js/libs/bootstrap-validator/dist/validator.min.js',
                  '../../assets/js/libs/select2/dist/js/select2.min.js',
                  '../../assets/js/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.js',
                  '../../assets/js/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
                  '../../assets/js/libs/bootpag/lib/jquery.bootpag.min.js',
                  '../../assets/js/libs/highlightjs/highlight.pack.min.js',
                  '../../assets/js/libs/jquery-countTo/jquery.countTo.js',
                  '../../assets/js/libs/jquery.countdown/dist/jquery.countdown.min.js',
                  '../../assets/js/libs/easyticker-jquery/jquery.easy-ticker.min.js',
                  '../../assets/js/libs/jquery.fitvids/jquery.fitvids.js',
                  '../../assets/js/libs/video.js/dist/video-js/video.js',
                  '../../assets/js/libs/raty/lib/jquery.raty.js',
                  '../../assets/js/libs/toastr/toastr.min.js',
                  '../../assets/js/libs/easyzoom/dist/easyzoom.js',
                  '../../assets/js/libs/isotope/dist/isotope.pkgd.min.js',
                  '../../assets/js/libs/isotope-packery/packery-mode.pkgd.min.js',
                  '../../assets/js/libs/fullpage.js/dist/jquery.fullpage.min.js',
                  '../../assets/js/libs/slimScroll/jquery.slimscroll.min.js',
                  '../../assets/js/plugins/portfolio-ajax/js/jquery.colio.min.js',
                  '../../assets/js/libs/moment/moment.js',
                  '../../assets/js/libs/fullcalendar/dist/fullcalendar.min.js',
                  '../../assets/js/libs/owl.carousel/dist/owl.carousel.min.js',
                  '../../assets/js/libs/flexslider/jquery.flexslider-min.js',
                  '../../assets/js/libs/bxslider-4/dist/jquery.bxslider.min.js',
                  '../../assets/js/libs/accordion-slider/jquery.accordionSlider.min.js',
                  '../../assets/js/libs/slick-carousel/slick/slick.min.js',
                  '../../assets/js/libs/magnific-popup/dist/jquery.magnific-popup.min.js',
                  '../../assets/js/plugins/slick-modal/jquery.slick-modals.min.js',
                  '../../assets/js/plugins/revolution-slider/revolution/js/jquery.themepunch.tools.min.js',
                  '../../assets/js/plugins/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js',
                  '../../assets/js/plugins/revolution-slider/revolution/js/extensions/revolution.extension.slideanims.min.js',
                  '../../assets/js/plugins/revolution-slider/revolution/js/extensions/revolution.extension.layeranimation.min.js',
                  '../../assets/js/plugins/revolution-slider/revolution/js/extensions/revolution.extension.kenburn.min.js',
                  '../../assets/js/plugins/revolution-slider/revolution/js/extensions/revolution.extension.navigation.min.js',
                  '../../assets/js/plugins/revolution-slider/revolution/js/extensions/revolution.extension.parallax.min.js',
                  '../../assets/js/libs/jflickrfeed/jflickrfeed.min.js',
                  '../../assets/js/libs/jribbble/dist/jribbble.min.js',
                  '../../assets/js/libs/Chart.js/Chart.min.js',
                  '../../assets/js/libs/jquery-knob/dist/jquery.knob.min.js',
                  '../../assets/js/libs/bootstrap-select/dist/js/bootstrap-select.js',
                  '../../assets/js/libs/velocity/velocity.js',
                  '../../assets/js/libs/velocity/velocity.ui.min.js',
                  '../../assets/js/libs/jQuery-One-Page-Nav/jquery.nav.js',
                  '../../assets/js/libs/multiscroll.js/jquery.multiscroll.min.js',
                  '../../assets/js/plugins/slick-modal/jquery.slick-modals.min.js',
                  '../../assets/js/blog.js',
                  '../../assets/js/charts.js',
                  '../../assets/js/ecommerce.js',
                  '../../assets/js/map.js',
                  '../../assets/js/masonry.js',
                  '../../assets/js/navigation.js',
                  '../../assets/js/overview.js',
                  '../../assets/js/portfolio.js',
                  '../../assets/js/portfolio_builder.js',
                  '../../assets/js/search.js',
                  '../../assets/js/text_animation.js',
                  '../../assets/js/restaurant.js',
                  '../../assets/js/builder.js',
                  '../../assets/js/sliders.js',
                  '../../assets/js/main.js',
                  '../../assets/js/widgets.js',
                  '../../assets/js/contact.js'],
                tasks:['uglify'],
                options: { spawn : false }
            },
            css: {
                files:[
                  '../../assets/js/libs/font-awesome/css/font-awesome.min.css', 
                  '../../assets/js/libs/bootstrap/dist/css/bootstrap.min.css', 
                  '../../assets/css/icons/nucleo.css',
                  '../../assets/js/libs/tether/dist/css/tether.min.css',
                  '../../assets/js/libs/flexslider/flexslider.css',
                  '../../assets/js/libs/owl.carousel/dist/assets/owl.carousel.css',
                  '../../assets/js/libs/owl.carousel/dist/assets/owl.theme.default.min.css',
                  '../../assets/js/libs/bxslider-4/dist/jquery.bxslider.min.css',
                  '../../assets/js/libs/accordion-slider/accordion-slider.min.css',
                  '../../assets/js/libs/slick-carousel/slick/slick.css',
                  '../../assets/js/plugins/revolution-slider/revolution/css/settings.css',
                  '../../assets/js/plugins/revolution-slider/revolution/css/navigation.css',
                  '../../assets/js/libs/magnific-popup/dist/magnific-popup.css',
                  '../../assets/js/libs/video.js/dist/video-js/video-js.min.css',
                  '../../assets/js/libs/videojs-sublime-skin/dist/videojs-sublime-skin.min.css',
                  '../../assets/js/libs/select2/dist/css/select2.min.css',
                  '../../assets/js/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.css',
                  '../../assets/js/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css',
                  '../../assets/js/libs/animate.css/animate.min.css',
                  '../../assets/js/libs/highlightjs/styles/solarized_dark.css',
                  '../../assets/js/libs/toastr/toastr.min.css',
                  '../../assets/js/libs/fullcalendar/dist/fullcalendar.min.css',
                  '../../assets/js/plugins/slick-modal/sm-minified.css',
                  '../../assets/css/colors.css', 
                  '../../assets/css/footers.css',
                  '../../assets/css/form.css',
                  '../../assets/css/blog.css',
                  '../../assets/css/events.css',
                  '../../assets/css/builder.css',
                  '../../assets/css/overview.css',
                  '../../assets/css/buttons.css',
                  '../../assets/css/main.css', 
                  '../../assets/css/masonry.css',
                  '../../assets/css/nav.css', 
                  '../../assets/css/hover-effects.css',
                  '../../assets/css/ecommerce.css',
                  '../../assets/css/portfolio.css',
                  '../../assets/css/preloader.css',
                  '../../assets/css/pricing-tables.css',
                  '../../assets/css/team.css',
                  '../../assets/css/text-animation.css',
                  '../../assets/css/pages.css',
                  '../../assets/css/sliders.css',
                  '../../assets/css/themes.css',
                  '../../assets/css/ui.css',
                  '../../assets/css/widgets.css',
                  '../../assets/css/restaurant.css'
                  ],
                tasks:['cssmin', 'replace'],
                options: { spawn : false, livereload: true }
            }
        }

    });

    grunt.registerTask('default', ['uglify', 'cssmin', 'replace']);

}

