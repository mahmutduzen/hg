$(document).ready(function() {
    var body = $('body'),
    sidebar = $('#sidebar'),
    content = $('#content'),
    toggleMenu = $('.toggle-menu');


    $('#content').load('intro.html');
    $('body').on('click', '.ajax-menu', function(e) {
        e.preventDefault();
        var pageName = $(this).data('page');
        $('#content').load(pageName, function(response, status, xhr) {
            if ( status == "error" ) {
                $('#content').load('404.html');
            }
            // tree view 
            if($('.folders-tree').length) $('.folders-tree').jstree();
            // prettyprint
            if($('.prettyprint').length) prettyPrint();
            closeSideMenu();
            $("html, body").animate({
                scrollTop: 0
            }, 0);
        });
    });

    //  Navigation submenu
    $('#nav > ul li > a').click(function(e){
        e.preventDefault();
        if(!$(this).parent().hasClass('submenu')){
            $('#nav > ul li').removeClass('current');
            $(this).parent().addClass('current');
        }        
        if($(this).hasClass('is-open')){
            $(this).removeClass('is-open');
            $(this).next().slideUp(300);
        }
        else{
            $(this).parent('.submenu').parent().find('.is-open').next().slideUp(300);
            $(this).parent('.submenu').parent().find('.is-open').removeClass('is-open');
            $(this).addClass('is-open');
            $(this).next().slideDown(300);
        }
    });

    // Mobile navigation
    toggleMenu.click(function(e) {
        e.preventDefault();
        if (toggleMenu.hasClass('active') === true) {
            toggleMenu.removeClass('active');
            closeSideMenu();
        } else {
            toggleMenu.addClass('active');
            body.addClass('aside-menu-open');
        }
    });
    body.click(function(e) {
        if ($(e.target).is('#sidebar') || $(e.target).parents('#sidebar').length || $(e.target).parents('.toggle-menu').length || $(e.target).hasClass('toggle-menu')) {
            return;
        }
        if (body.hasClass('aside-menu-open') === true) { 
            closeSideMenu();
        }
    });
    function closeSideMenu(){
        if(body.hasClass('aside-menu-open')){
            body.removeClass('aside-menu-open');
            body.addClass('aside-menu-closing');
            toggleMenu.removeClass('active');
            setTimeout(function() {
                if (body.hasClass('aside-menu-closing') === true) {
                    body.removeClass('aside-menu-closing');
                }
            }, 500);
        } 
    }
    
  
});