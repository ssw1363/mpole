<?php require_once('./connectDB.php');
  $currentPage = 1;
  if (isset($_POST["currentPage"])) {
      $currentPage = $_POST["currentPage"];
  }
  //mysqli_connect()함수로 커넥션 객체 생성
  $conn= isConnectDb($db);

  //페이징 작업을 위한 테이블 내 전체 행 갯수 조회 쿼리
  $sqlCount = "SELECT count(*) FROM board";
  $resultCount = mysqli_query($conn,$sqlCount);
  if($rowCount = mysqli_fetch_array($resultCount)){
      $totalRowNum = $rowCount["count(*)"];   //php는 지역 변수를 밖에서 사용 가능.
  }
  //행 갯수 조회 쿼리가 실행 됐는지 여부
  if($resultCount) {
      echo "행 갯수 조회 성공 : ". $totalRowNum."<br>";
      echo "현재 페이지 위치 : ". $currentPage."<br>";
  } else {
      echo "결과 없음: ".mysqli_error($conn);
  }

  $rowPerPage = 5;   //페이지당 보여줄 게시물 행의 수
  $begin = ($currentPage -1) * $rowPerPage;
  //board 테이블을 조회해서 board_no, board_title, board_user, board_date 필드 값을 내림차순으로 정렬하여 모두 가져 오는 쿼리
  //입력된 begin값과 rowPerPage 값에 따라 가져오는 행의 시작과 갯수가 달라지는 쿼리
  $sql = "SELECT board_no, board_title, board_user, board_date, board_hit FROM board order by board_no desc limit ".$begin.",".$rowPerPage."";
  $result = mysqli_query($conn,$sql);
  //쿼리 조회 결과가 있는지 확인
  if($result) {
    echo "조회 성공";
  } else {
    echo "결과 없음: ".mysqli_error($conn);
  }
?>



<section id="notice" class="notice">
  <div class="container" style="font-size: 1.4rem;">
    <div class="table-responsive">
      <!-- <a class="btn btn-secondary float-right" data-position="./html/textEditor.html" role="button">글쓰기</a>  -->
      <table class="table table-hover" style="color: aliceblue; text-align: center;">
        <thead>
          <tr>
            <th scope="col" style="width:50px;">번호</th>
            <th scope="col">제목</th>
            <th scope="col" style="width:115px;">작성자</th>
            <th scope="col" style="width:90px;">날짜</th>
            <th scope="col" style="width:60px;">조회</th>
          </tr>
        </thead>
        <tbody>
        <?php
          //반복문을 이용하여 result 변수에 담긴 값을 row변수에 계속 담아서 row변수의 값을 테이블에 출력한다.
          while($row = mysqli_fetch_array($result)){ 
        ?>
          <tr>
            <td>
              <?php
                echo $row["board_no"];
                ?>
            </td>
            <td>
              <?php
                echo "<a onclick='board_detail(".$row["board_no"].")'>";
                // <a href='./php/board_detail.php?board_no=".$row["board_no"]."'>";
                echo $row["board_title"];
                echo "</a>"   
              ?>
            </td>
            <td>
              <?php
                echo $row["board_user"];
              ?>
            </td>
            <td>
              <?php
                echo $row["board_date"];
              ?>
            </td>
            <td>
              <?php
                echo $row["board_hit"];
              ?>
            </td>
          </tr>
          <?php 
            // echo "<td><a href='./board_update_form.php?board_no=".$row["board_no"]."'>수정</a></td>";
            // echo "<td><a href='./board_delete_form.php?board_no=".$row["board_no"]."'>삭제</a></td>";
          ?>
        <?php
          }
          ?>










          <!-- <tr>
            <td scope="row">5</td>
            <td>라이다 센서를 이용한 컨베이어 벨트 사고 예방 솔루션</td>
            <td>mpolesystem</td>
            <td>2019-06-15</td>
            <td>57</td>
          </tr>
          <tr>
            <td scope="row">4</td>
            <td>라이다 기반 외곽 침입 감지 솔루션 제안</td>
            <td>mpolesystem</td>
            <td>2019-06-21</td>
            <td>134</td>
          </tr>
          <tr>
            <td scope="row">3</td>
            <td>소방방재 솔루션 제안</td>
            <td>mpolesystem</td>
            <td>2019-06-21</td>
            <td>62</td>
          </tr>
          <tr>
            <td scope="row">2</td>
            <td>외곽 침임 감지 솔루션 제안</td>
            <td>mpolesystem</td>
            <td>2019-06-21</td>
            <td>48</td>
          </tr>
          <tr>
            <td scope="row">1</td>
            <td>RF-ID 기반 Tracking 솔루션 제안</td>
            <td>mpolesystem</td>
            <td>2019-06-21</td>
            <td>48</td>
          </tr> -->
        </tbody>
      </table>
    </div>
      <hr />
      &nbsp;&nbsp;&nbsp;&nbsp;
        <?php
            //currentPage 변수가 1보다 클때만 이전 버튼이 활성화 되도록 함
            if($currentPage > 1 ) { 
              echo "<a class='btn btn-primary align-items-end' onclick= 'go_list($currentPage-1)' >이전</a>&nbsp;&nbsp;&nbsp;&nbsp;";
              //이전 버튼이 클릭될때 GET방식으로 currentPage변수 값에 1을 뺀 값이 넘어가도록 함
                // echo "<a class='btn btn-primary' href ='./board_list.php?currentPage=".($currentPage-1)."'>이전</a>&nbsp;&nbsp;&nbsp;&nbsp;";
            }
 
            $lastPage = ($totalRowNum-1) / $rowPerPage;
 
            if (($totalRowNum-1) % $rowPerPage !=0) { 
                $lastPage += 1;
            }
            //lastPage변수가 currentPage 변수보다 클때만 다음 버튼이 활성화 되도록 함
            if($currentPage < $lastPage) { 
              echo "<a class='btn btn-primary align-items-end' onclick= 'go_list($currentPage+1)'>다음</a>";
              //다음 버튼이 클릭될때 GET방식으로 currentPage변수 값에 1을 더한 값이 넘어가도록 함
                // echo "<a class='btn btn-primary' href='./board_list.php?currentPage=".($currentPage+1)."'>다음</a>";
            }
            mysqli_close($conn);
        ?>
        &nbsp;&nbsp;
        <a class="btn btn-primary align-items-end" onclick="write_notice()">글 쓰기</a>
      
      <!-- <nav aria-label="Page navigation" class="btn-toolbar justify-content-between" role="toolbar">
        <div></div>
        <ul class="pagination justify-content-center">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
        <div></div>
      </nav> -->
  </div>
</section>

<script src="./js/notice.js"></script>
