<?php 
require_once('./load_list.php');
$result = load_post();
  
?>

<script>
    var page = 1;
    function load_list() {
      //요청할 페이지
      ++page;
      $.ajax({
        type : "POST",
        url : "./php/ajax_more_post.php",
        data : { "currentPage" : page },
        success : function(html){
          // console.log("성공");
          $(".post ul").append(html);
        },
        error : function(err){
          console.log("실패"+err);
        }
      });
    }
</script>
<section id="post" class="post">
    <div class="container">
        <ul>
            <?php 
                while($row = mysqli_fetch_array($result)){
              ?>

              <li class="row post_list">  
                  <div class="post_img">
                    <?php echo "<a onclick='post_detail(".$row[post_no].")'><img src='".$row[post_img1]."'></a>" ?>
                  </div>
                  <div class="post_desc">
                    <div class="post_title"><?php echo "<a onclick='post_detail(".$row[post_no].")'>  $row[post_title] </a>" ?></div>
                    <div class="post_info">By <?php echo $row[post_writer]?> | <?php echo $row[post_date]?></div>
                    <?php echo"<a onclick='post_detail(".$row[post_no].")'>" ?>
                    <div class="post_content"><?php echo $row[post_content]?></div>
                    <div class="post_more"> Read More > </div>  
                    <?php echo"</a>" ?>
                  </div>

              </li>

            <?php
                }

                mysqli_close($conn);
            ?>
            
        </ul>
        <br>
        <a class="btn btn-secondary btn-lg btn-block more" onclick="load_list()">더보기</a>
    </div>
</section>
<script src="./js/notice.js"></script>
