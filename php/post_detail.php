<section id="detail" class="detail">
    <div class="container">    
        <?php
            require("./connectDB.php");
            extract($_POST);

            $conn = isConnectDb($db);
            $sql = "SELECT max(post_no) max, min(post_no) min FROM post";
            $num_cnt = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($num_cnt);
            $max_no = $row["max"];
            $min_no = $row["min"];
            $sql = "SELECT post_no, post_title, post_content, post_img1, post_img2, post_img3, post_img4, post_img5  FROM post WHERE post_no = $post_no"  ;
            $result = mysqli_query($conn,$sql);
            
        ?>

        <div class="table-responsive">
            <?php
                if($row = mysqli_fetch_array($result)) {
            ?>

            <div class="row">
                <!-- 
                <a <?php echo "onclick= post_detail(".((int)$row[post_no]-1).")" ?> >	&lt; Previous</a>
                &nbsp;&nbsp;&nbsp;&nbsp;  
                <a <?php echo "onclick= post_detail(".((int)$row[post_no]+1).")" ?> >Next &gt;</a> 
                -->
                
                <!-- 처음글 마지막글에 링크태그 없애기 -->
                <?php if($min_no != $row[post_no]){ ?>
                <a <?php echo "onclick= post_detail(".((int)$row[post_no]-1).")" ?> >	&lt; Previous</a>
                <?php }else {echo "<a>Previous</a>";}?>
                &nbsp;&nbsp;&nbsp;&nbsp;  
                <?php if($max_no != $row[post_no]){ ?> 
                <a <?php echo "onclick= post_detail(".((int)$row[post_no]+1).")" ?> >Next &gt;</a>
                <?php }else {echo "<a>Next</a>";}?>
            </div>
            <div class="thumbnail"><img <?php echo "src= '".$row[post_img1]."' " ?> alt=""></div>
            <div class="post_title"><?php echo $row[post_title] ?></div>
            <div class=""><img <?php echo "src= '".$row[post_img1]."' " ?> alt=""></div>
            <div class="post_content"><pre><?php echo $row[post_content] ?></pre></div>
            <div class=""><img <?php echo "src= '".$row[post_img2]."' " ?> alt=""></div>
            <div class=""><img <?php echo "src= '".$row[post_img3]."' " ?> alt=""></div>
            <div class=""><img <?php echo "src= '".$row[post_img4]."' " ?> alt=""></div>
            <div class=""><img <?php echo "src= '".$row[post_img5]."' " ?> alt=""></div>

            <?php
                }
            ?>
        
        </div>
        <br>
        &nbsp;&nbsp;&nbsp;
        <?php
                echo "<a class='btn btn-primary' onclick='post_list()'> 리스트로 돌아가기</a> ";   
              ?>

        <!-- <div class ="table-responsive">
            <img src="./resource/img/mpole/post/cms_temp_article_25102214335560.jpg" alt="">
            <div class="post_title">title</div>
            <div class="post_content">content</div>
            <img src="./resource/img/mpole/post/cms_temp_article_25102214335560.jpg" alt="">
            <img src="./resource/img/mpole/post/cms_temp_article_25102214335560.jpg" alt="">
            <img src="./resource/img/mpole/post/cms_temp_article_25102214335560.jpg" alt="">
            <img src="./resource/img/mpole/post/cms_temp_article_25102214335560.jpg" alt="">
            <img src="./resource/img/mpole/post/cms_temp_article_25102214335560.jpg" alt="">

        </div> -->
    </div>
</section>

<script src="./js/notice.js"></script>
