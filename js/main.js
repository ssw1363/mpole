$(document).ready(function(){

    // document.getElementById("main").innerHTML='<object type="text/html" data="main.html"></object>';

    
    
    // var main_div = getElementById("main");
    
    // $(main_div).attr("data-include","imp.html");
})
$( document ).ready( function() {
  
  // var uri;
  // var main = $('#main');
  // var a_tag = $('[data-position]');
  // $(a_tag).each(function(){
  //   $(this).click(function(){
  //     uri = $(this).data('position');
  //     main.css("opacity","0");
  //     main.scrollTop(0);
  //     main.animate({
  //       // opacity: 0
  //     }, function(){
  //       // main.load(uri).scrollTop(0); 
  //       $(this).animate({
  //         opacity: 1
  //       },1000,'linear');
  //     });
      
  //   });
  // });   
  $(window).resize(function(){
    if($("section").attr("id") == "index"){
      window.location.replace("./index.html");
      }
    }); 

});
  
  if(window.innerWidth <= '540') {
    console.log(window.innerWidth+"1");
  var main = $('.main-slider').bxSlider({
    mode: 'horizontal',// 가로 방향 수평 슬라이드
    speed: 500,        // 이동 속도를 설정
    pager: false,      // 현재 위치 페이징 표시 여부 설정
    moveSlides: 1,     // 슬라이드 이동시 개수
    // slideWidth:200,    // 슬라이드 너비
    minSlides: 1,      // 최소 노출 개수
    maxSlides: 2,      // 최대 노출 개수
    slideMargin: 5,    // 슬라이드간의 간격
    auto: false,  
    autoControls: false,     // 자동 실행 여부
    autoHover: true,   // 마우스 호버시 정지 여부
    controls: true,    // 이전 다음 버튼 노출 여부
    touchEnabled : (navigator.maxTouchPoints > 0), //크롬에서 링크 안될때 추가
  });
  }else if(window.innerWidth <= '768') {
  var main = $('.main-slider').bxSlider({
    mode: 'horizontal',// 가로 방향 수평 슬라이드
    speed: 500,        // 이동 속도를 설정
    pager: false,      // 현재 위치 페이징 표시 여부 설정
    moveSlides: 1,     // 슬라이드 이동시 개수
    slideWidth:250,    // 슬라이드 너비
    minSlides: 1,      // 최소 노출 개수
    maxSlides: 2,      // 최대 노출 개수
    slideMargin: 5,    // 슬라이드간의 간격
    auto: false,  
    autoControls: false,     // 자동 실행 여부
    autoHover: true,   // 마우스 호버시 정지 여부
    controls: true,    // 이전 다음 버튼 노출 여부
    touchEnabled : (navigator.maxTouchPoints > 0), //크롬에서 링크 안될때 추가
  });
  }

  
  $(".bx-stop").click(function(){	// 중지버튼 눌렀을때
    main.stopAuto();
    $(".bx-stop").hide();
    $(".bx-start").show();
    return false;
  });
  
  $(".bx-start").click(function(){	//시작버튼 눌렀을때
    main.startAuto();
    $(".bx-start").hide();
    $(".bx-stop").show();
    return false;
  });
  
  $(".bx-start").hide();	//onload시 시작버튼 숨김.
  
  
  $('.bxslider').on('mousewheel', function(event) {
    
    //console.log(event.deltaX, event.deltaY, event.deltaFactor);
    if(event.deltaY > 0){
      main.goToPrevSlide();
    } else {
      main.goToNextSlide(); 
    }
    
  });
  