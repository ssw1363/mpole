<?php 
require_once('./load_video.php');
$result = load_list();
  
?>

<script>
function preview_evt() {
  var timer;
    // 마우스 진입 이벤트
      $(".preview_div").each(function(){
          var url = $(this).data('gif_url'); 
          // if(window.innerWidth > 425){
            $(this).on('mouseenter', function(){
              //이벤트 타이머 생성
              timer = window.setTimeout(() => {
                // 재생 버튼 감추기
                $(this).find('img').animate({'opacity':0},1000);
                $(this).find('i').animate({'opacity':0},500);
                // 썸네일 이미지를  gif 이미지로 변경
                $(this).css('background-image', 'url('+url+')');
              }, 1000);

            });
            $(this).on('mouseleave', function(){
              //mouseleave시 타이머 남아있다면 제거
              if(timer) window.clearTimeout(timer);
              // 재생 버튼 보아기
              $(this).find('img').animate({'opacity':1},100);
              $(this).find('i').animate({'opacity':1},100);
              $(this).find('background-image').hide();
              // gif 이미지를  썸네일 이미지로 변경
              // $(this).css('background-image', 'url('+url+')');
            });
          // }
      });
}
    //현재 보여지는 페이지
    var page = 1;
    function load_list() {
      //요청할 페이지
      ++page;
      $.ajax({
        type : "POST",
        url : "./php/ajax_more.php",
        data : { "currentPage" : page },
        success : function(html){
          // console.log("성공");
          $(".video div.row").append(html);
          preview_evt();
          popup_evt();
        },
        error : function(err){
          console.log("실패"+err);
        }
      });
    }
</script>
<link rel="stylesheet" href="./css/YouTubePopUp.css">
<section id="video" class="video">
    <div class="container">
      <div class="col-lg-12 content" >
        <div class="content-title"><h3><strong>V</strong>ideo </h3><div><span>제품 동영상</span></div></div>
            <div class="row">
              <?php 
                while($row = mysqli_fetch_array($result)){
              ?>

              <div>  
                <?php echo " <div class='preview_div' data-gif_url='".$row["vdo_gif"]."'> " ?>
                  <?php echo "<a class='bla-1' data-href='".$row["vdo_href"]."' >" ?>
                    <?php echo " <img src='".$row[vdo_thumbnail]."' > " ?>
                    <i class='bx bx-play-circle'></i>
                    <div class="video_title"><?php echo " <p>".$row[vdo_title]."</p> " ?></div>
                  <?php echo "</a>" ?>
                <?php echo "</div>" ?>

              </div>

              <?php
                }

                mysqli_close($conn);
              ?>
          </div>
            <br><br>
          <a class="btn btn-secondary btn-lg btn-block more" onclick="load_list()" >더보기</a>
          

          
      </div>
    </div>
  </section>
  <script>
    jQuery(function() {
      popup_evt();
      preview_evt();
    });
    function popup_evt() { 
        jQuery(".bla-1").YouTubePopUp({ autoplay: 1 });
      }
  </script>