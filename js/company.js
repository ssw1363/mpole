var slider1, slider2
$(document).ready(function(){
    $(window).resize(function(){
      if($("section").attr("id") == "company" ){
          // window.location.replace("./index.html");       
          
      }
    });
  })

  $(function() {
    
    //main load 후 링크 위치로 이동 
    
    var href =sessionStorage.getItem('href');
    // console.log($(href).offset().top);
    //   $('html, #main').animate({
    //     scrollTop: $(href).position().top
    // }, 500);
    moveScroll(href);
	// check native support
	// $('#support').text($.fullscreen.isNativelySupported() ? 'supports' : 'doesn\'t support');
	// open in fullscreen
	$('.bx-fullscreen').click(function() {
    $("#map").fullscreen();
		return false;
	});
	// exit fullscreen
	$('.bx-exit-fullscreen').click(function() {
		$.fullscreen.exit();
		return false;
	});
	// document's event
	$(document).bind('fscreenchange', function(e, state, elem) {
		// if we currently in fullscreen mode
		if ($.fullscreen.isFullScreen()) {
			$('.bx-fullscreen').hide();
			$('.bx-exit-fullscreen').show();
		} else {
			$('.bx-fullscreen').show();
			$('.bx-exit-fullscreen').hide();
		}
		// $('#state').text($.fullscreen.isFullScreen() ? '' : 'not');
	});
});
        
    // //전체화면 보기
    var elem = document.getElementById("map");
    var full = document.getElementsByClassName('bx-fullscreen');
    var exit = document.getElementsByClassName('bx-exit-fullscreen');
    
    // /* When the openFullscreen() function is executed, open the video in fullscreen.
    // Note that we must include prefixes for different browsers, as they don't support the requestFullscreen method yet */
    // function openFullscreen() {
        
    //     if (mapContainer.requestFullscreen) {
    //         mapContainer.requestFullscreen();
            
    //     } else if (mapContainer.mozRequestFullScreen) { /* Firefox */
    //         mapContainer.mozRequestFullScreen();
    //     } else if (mapContainer.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
    //         mapContainer.webkitRequestFullscreen();
    //     } else if (mapContainer.msRequestFullscreen) { /* IE/Edge */
    //         mapContainer.msRequestFullscreen();
    //     }
    // }


if(window.innerWidth <= '991' ) {
    console.log(window.innerWidth+"2");
  $('.reference-slider').bxSlider({
    mode: 'horizontal',// 가로 방향 수평 슬라이드
    speed: 500,        // 이동 속도를 설정
    pager: false,      // 현재 위치 페이징 표시 여부 설정
    moveSlides: 1,     // 슬라이드 이동시 개수
    // slideWidth:250,    // 슬라이드 너비
    minSlides: 1,      // 최소 노출 개수
    maxSlides: 1,      // 최대 노출 개수
    slideMargin: 5,    // 슬라이드간의 간격
    auto: false,  
    autoControls: false,     // 자동 실행 여부
    // autoHover: true,   // 마우스 호버시 정지 여부
    controls: true,    // 이전 다음 버튼 노출 여부
    touchEnabled : (navigator.maxTouchPoints > 0) //크롬에서 링크 안될때 추가
  });

  $('.certified-slider').bxSlider({
    mode: 'horizontal',// 가로 방향 수평 슬라이드
    speed: 500,        // 이동 속도를 설정
    pager: false,      // 현재 위치 페이징 표시 여부 설정
    moveSlides: 1,     // 슬라이드 이동시 개수
    slideWidth:250,    // 슬라이드 너비
    minSlides: 2,      // 최소 노출 개수
    maxSlides: 2,      // 최대 노출 개수
    slideMargin: 5,    // 슬라이드간의 간격
    auto: false,  
    autoControls: false,     // 자동 실행 여부
    // autoHover: true,   // 마우스 호버시 정지 여부
    controls: true,    // 이전 다음 버튼 노출 여부
    touchEnabled : (navigator.maxTouchPoints > 0) //크롬에서 링크 안될때 추가
  });
  
  // $(".bx-stop").click(function(){	// 중지버튼 눌렀을때
  //   main.stopAuto();
  //   $(".bx-stop").hide();
  //   $(".bx-start").show();
  //   return false;
  // });
  
  // $(".bx-start").click(function(){	//시작버튼 눌렀을때
  //   main.startAuto();
  //   $(".bx-start").hide();
  //   $(".bx-stop").show();
  //   return false;
  // });
  
  // $(".bx-start").hide();	//onload시 시작버튼 숨김.
  
  //마우스휠
//   $('.bxslider').on('mousewheel', function(event) {
    
//     //console.log(event.deltaX, event.deltaY, event.deltaFactor);
//     if(event.deltaY > 0){
//       main.goToPrevSlide();
//     } else {
//       main.goToNextSlide(); 
//     }
    
//   });
  
  
}
