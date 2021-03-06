var a_tag = $('[data-position]');
var cur_url;
var prev_page ;
class Stack {
    constructor() {
      this._arr = [];
    }
  
    push(item){
      this._arr.push(item);
    }
    pop(){
      return this._arr.pop();
    }
    peek() {
      return this._arr[this._arr.length - 1];
    }
  }
  
  const stack = new Stack();

$( document ).ready(function() {
    // console.log(a_tag)
    $(a_tag).each(function(){
        $(this).click(function(){
            var curr_page = $("section").attr("class"); 
            var url = $(this).data('position');
            var state = url.replace("./html","").replace(".html","");
            // console.log(uri);
            var main = $('#main');
            var href= $(this).data('focus');
            // sessionStorage.setItem("href",href);
            if(url == "./html/"+curr_page+".html"){
                if(curr_page =="company"){
                    // console.log('동일페이지로')
                    moveScroll(href);
                }
            }else if(url == "./html/company.html"){
                // console.log("회사소개 페이지로")
                // goTop();
                main.css("opacity","0");
                main.animate({
                }, function(){
                    prev_page= curr_page;
                    // main.load(url, stack.push(url), stack.push(url) );
                    main.load(url, stack.push(url), pushState("")); 
                    
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
                    // main.load(url, stack.push(url), stack.push(url)); 
                    main.load(url, stack.push(url),pushState("")); 

                    $(this).animate({
                        opacity: 1
                    }, 1000, 'linear');
                }); 
            }
        
        });
    });   

});



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
        
        // console.log(stack.pop());
        var uri = stack.pop();
        if($("body").hasClass('modal-open')){
            return true;
        }
        else if(uri != undefined){
            $("#main").load(uri);
            goTop();
            // console.log(stack._arr);
        }else {
           window.refresh();
        }
    }
}

function goTop(){
	document.documentElement.scrollTop = 0; 
}
    

function pushState(url) {
    window.history.pushState("","",url);
    // console.log(window.history);
}
document.onkeydown = noEvent;