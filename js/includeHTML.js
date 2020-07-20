// var a_tag = $("[link-position]");

$(function(){
    includeLayiut();    
});

function includeLayiut(){
    var includeArea = $('[data-include]');
    var self, url;
    $.each(includeArea, function(){
        self = $(this);
        url = self.data("include");
        self.load(url, function(){
            self.removeAttr("data-include");
        });
    });
}
// 새로고침 막기
// function noEvent() {
//     if (event.keyCode == 116) {
//         event.keyCode= 2;
//         return false;
//     }
//     else if(event.ctrlKey && (event.keyCode==78 || event.keyCode == 82)){
//         return false;
//     }
    
//     }

    
// document.onkeydown = noEvent;
