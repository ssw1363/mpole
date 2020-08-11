var a_tag = $('[data-position]');
var youtube= $('#youtube');
$( document ).ready( function() {
    $(a_tag).each(function(){
        $(this).click(function(){
            var href= $(this).data('focus');
            var uri = $(this).data('position');
            sessionStorage.setItem("href",href);
            var main = $('#main');
        main.css("opacity","0");
        main.animate({
            // opacity: 0
        }, function(){
            main.load(uri); 
            $(this).animate({
                opacity: 1
            },1000,'linear');
        });
        
        });
    });   
});


youtube.click(function(){
    window.open('https://www.youtube.com/channel/UC8MK4cM31SkUbMHY3BGe-5w');
})
function moveScroll(href){
    $(window).scrollTop($(href).offset().top);
}
