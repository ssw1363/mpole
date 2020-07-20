var a_tag = $('[data-position]');
var curr_uri;
var prev_page ;

$( document ).ready(function() {
    console.log(a_tag)
    $(a_tag).each(function(){
        $(this).click(function(){
            var curr_page = $("section").attr("class"); 
            var uri = $(this).data('position');
            var main = $('#main');
            var href= $(this).data('focus');
            // sessionStorage.setItem("href",href);
            if(uri == "./html/"+curr_page+".html"){
                if(curr_page =="company"){
                    console.log('동일페이지로')
                    moveScroll(href);
                }
            }else if(uri == "./html/company.html"){
                // console.log("회사소개 페이지로")
                // goTop();
                main.css("opacity","0");
                main.animate({
                }, function(){
                    prev_page= curr_page;
                    main.load(uri);
                    $(this).animate({
                        opacity: 1,
                    },1000,'linear');
                }
                );   
                
         
            }            
            else {
                // console.log('다른페이지로')
                goTop();
                main.css("opacity","0");
                main.animate({
                }, function(){
                    prev_page= curr_page;
                    main.load(uri); 
                    $(this).animate({
                        opacity: 1
                    },1000,'linear');
                }); 
            }
        
        });
    });   
});


function goTop(){
	document.documentElement.scrollTop = 0; 
}

function moveScroll(href){
    $(window).scrollTop($(href).offset().top);
}

//리로드
function refresh() {
    location.href="./";
}

// 새로고침 막기
function noEvent() {
    if (event.keyCode == 116) {
        event.keyCode= 2;
        return false;
    }
    else if(event.ctrlKey && (event.keyCode==78 || event.keyCode == 82)){
        return false;
    }
    // 이전 페이지로 돌아아오기
    else if(event.keyCode == "8") {
        // console.log("where is "+prev_page);
        $("#main").load("./html/"+prev_page+".html");
        goTop();
        }
    }

    
document.onkeydown = noEvent;