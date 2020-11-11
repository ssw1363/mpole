<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require "./PHPMailer/src/PHPMailer.php";
// require "./PHPMailer/src/SMTP.php";
// require "./PHPMailer/src/Exception.php";
require '../vendor/PHPMailer/PHPMailerAutoload.php';

$dw_only = false;

//▶ method=post 방식으로 넘어온 값들을 extract 시킴(php.ini 파일에서 register_globals=off 일때 필요)
extract($_POST);
$fname = $_FILES['file']['name'];
$fname2 = $_FILES['file2']['name'];

// echo $fname;
// echo $from_name;
// echo $from;
// echo $subject;
// echo $content;


$mail = new PHPMailer(true);

// try {

    // 서버세팅
    $mail -> SMTPDebug = 2;    // 디버깅 설정
    $mail -> isSMTP(true);        // SMTP 사용 설정

    $mail -> Host = "wsmtp.ecounterp.com";          // email 보낼때 사용할 서버를 지정
    $mail -> SMTPAuth = true;                       // SMTP 인증을 사용함
    $mail -> Username = "swseo@mpole.co.kr";        // 메일 계정
    $mail -> Password = "dhksl2437";                // 메일 비밀번호
    $mail -> SMTPSecure = "TLS";                    // SSL을 사용함
    // $mail -> Port = 465;                            // email 보낼때 사용할 포트를 지정
    $mail -> Port = 587;                            // email 보낼때 사용할 포트를 지정
    $mail -> CharSet = "utf-8";                     // 문자셋 인코딩

    // 보내는 메일
    $mail -> setFrom("swseo@mpole.co.kr", "문의메일");

    // 받는 메일
    $mail -> addAddress("as@mpole.co.kr", "엠폴시스템");
    // 첨부파일
    if($fname !=""){
      $mail->AddAttachment($_FILES['file']['tmp_name'],$fname);
    }
    if($fname2 !=""){
      $mail->AddAttachment($_FILES['file2']['tmp_name'],$fname2);
    } 
    // $mail -> addAttachment("./anjihyn.jpg");

    // 메일 내용
    $mail -> isHTML(true);                    // HTML 태그 사용 여부
    $mail -> Subject = $subject;              // 메일 제목
    $mail -> Body = "<table width=637 border=0 cellspacing=0 cellpadding=0>
    <tr>
      <td height=30><table width=637 border=0 cellspacing=0 cellpadding=0>
        <tr>
          <td width=10> </td>
          <td width=111 height=30><strong>이름</strong></span></td>
          <td width=516 align=left>$from_name</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height=30><table width=637 border=0 cellspacing=0 cellpadding=0>
        <tr>
          <td width=10> </td>
          <td width=111 height=30><strong>이메일</strong></span></td>
          <td width=516 align=left>$from</td>
        </tr>
      </table></td>
    </tr>
    <tr>
     <td height=30><table width=637 border=0 cellspacing=0 cellpadding=0>
        <tr>
          <td width=10> </td>
          <td width=111 height=30><strong>제목</strong></td>
          <td width=516 align=left>$subject</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height=30><table width=637 border=0 cellspacing=0 cellpadding=0>
        <tr>
          <td width=10> </td>
          <td width=111 height=30><strong>문의내용</strong></td>
          <td width=516 align=left>$content</td>
        </tr>
      </table></td>
    </tr>
  </table>";    // 메일 내용

    // Gmail로 메일을 발송하기 위해서는 CA인증이 필요하다.
    // CA 인증을 받지 못한 경우에는 아래 설정하여 인증체크를 해지하여야 한다.
    $mail -> SMTPOptions = array(
        "tls" => array(
            //   "verify_peer" => false
            // , "verify_peer_name" => false
            // , "allow_self_signed" => true
            'verify_peer' => true,
            'verify_peer_name' => true,
            'allow_self_signed' => false,
            'cafile' => '[path-to-cert].crt'
        )
    );
    
    // 메일 전송
    // $mail -> send();

    if(!$mail->send()) 
{
      //  echo "Mailer Error: " . $mail -> ErrorInfo;
      echo("<script>
      self.close();
      opener.alert('메일 발송이 실패하였습니다\n 관리자에게 문의해주세요.');
      </script>");
} 
else 
{
  echo("<script>
  self.close();
  opener.alert('성공적으로 메일이 발송되었습니다.');
  </script>"); 
}
    
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error : ", $mail -> ErrorInfo;
// } finally {
//     // Header("Location: mpole.co.kr");
//     echo("<script>location.href='http://localhost:81/ex_site/';</script>"); 

// }

?>