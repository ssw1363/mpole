$(document).ready(function(){

    //다운로드 링크 새창 띄우기
  $('.down-link').each(function(){
    $(this).click(function() {
      var url = $(this).data('link');
      window.open(url);
    })
  })
})