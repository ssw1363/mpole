<section id="detail" class="detail">
    <div class="container">
        <style>
            .table {
                table-layout: fixed;
                word-wrap: break-word;
                color : white;
            }
        </style>
        <h1 class="display-4">board_detail.php</h1>
     
        <?php
            require("./connectDB.php");
            extract($_POST);

            $conn = isConnectDb($db);
 
            //mysqli_connect()함수로 커넥션 객체 생성
            // $conn = mysqli_connect($db['host'],$db['user'],$db['pass'],$db['name']);
            
            // //mysql 커넥션 객체 생성
            // $conn = mysqli_connect("localhost", "root", "java0000","jjdev");
            //커넥션 객체 생성 여부 확인
            // if($conn) {
            //     echo "연결 성공<br>";
            // } else {
            //     die("연결 실패 : " .mysqli_error());
            // }
            //board_list.php 에서 넘어온 글 번호 저장 및 출력
                
            echo $board_no ;
            // $board_no = $_GET["board_no"];
            echo $board_no."번째 글 내용<br>";
            //입장 시 조회수 +1 
            $sql = "UPDATE board set board_hit = board_hit + 1 where board_no = $board_no";
            $result = mysqli_query($conn,$sql);
            //board 테이블에서 board_no값이 일치하는 board_no, board_title, board_content, board_user, board_date 필드 값 조회 쿼리
            $sql = "SELECT board_no, board_title, board_content, board_user, board_date FROM board WHERE board_no = '".$board_no."'";
            $result = mysqli_query($conn,$sql);
            //조회 성공 여부 확인
            if($result) {
                echo "조회 성공";
            } else {
                echo "결과 없음: ".mysqli_error($conn);
            }
        ?>
        <table class="table table-bordered" style="width:50%">
            <?php
                //result 변수에 담긴 값을 row 변수에 저장하여 테이블에 출력
                if($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td style="width:15%">작성자</td>
                <td style="width:35%">
                    <?php
                        echo $row["board_user"];
                    ?>
                </td>
            </tr>
            <tr>
                <td style="width:10%">글 제목</td>
                <td style="width:15%">
                    <?php
                        echo $row["board_title"];
                    ?>
                </td>
                <td style="width:5%">글 번호</td>
                <td style="width:3%">
                        <?php
                            echo $row["board_no"];
                        ?>
                </td>
                <td  style="width:5%">작성 일자</td>
                <td  style="width:3%">
                    <?php
                        echo $row["board_date"];
                    ?>
                </td>
                
            </tr>
            <tr>
                <td colspan="6">
                    <?php
                        echo $row["board_content"];
                    ?>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
        <br>
        &nbsp;&nbsp;&nbsp;
        <?php
                echo "<a class='btn btn-primary' onclick='board_list()'> 리스트로 돌아가기</a> ";   
              ?>

        <!-- <a class="btn btn-primary" href="./board_list.php"> 리스트로 돌아가기</a> -->
    </div>
</section>

<script>
  function board_list(){ 
    $('#main').load('./php/notice.php');
    }
</script>