<?php require_once('./connectDB.php');

    $currentPage = 1;
    if (isset($_POST["currentPage"])) {
        $currentPage = $_POST["currentPage"];
    }
    //mysqli_connect()함수로 커넥션 객체 생성
    $conn= isConnectDb($db);
  
    //페이징 작업을 위한 테이블 내 전체 행 갯수 조회 쿼리
    $sqlCount = "SELECT count(*) FROM video";
    $resultCount = mysqli_query($conn,$sqlCount);
    if($rowCount = mysqli_fetch_array($resultCount)){
        $totalRowNum = $rowCount["count(*)"];   //php는 지역 변수를 밖에서 사용 가능.
    }

    $rowPerPage = 3;   //페이지당 보여줄 게시물 행의 수
    $begin = ($currentPage -1) * $rowPerPage;
    //board 테이블을 조회해서 board_no, board_title, board_user, board_date 필드 값을 내림차순으로 정렬하여 모두 가져 오는 쿼리
    //입력된 begin값과 rowPerPage 값에 따라 가져오는 행의 시작과 갯수가 달라지는 쿼리
    $sql = "SELECT post_no, post_title, post_writer, post_content, post_date, post_img1 FROM post order by post_no desc limit ".$begin.",".$rowPerPage."";
    $result = mysqli_query($conn,$sql);

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
?>


