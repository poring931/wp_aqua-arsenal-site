<?php

  // $to='poring.m@mail.ru';
  $to='igorkladnichkin@gmail.com, dental_belozub@mail.ru';
  $from = "dentaklad";
  $selectedProjects  = 'Не выбрано';


  $subject = "Заявка с сайта dentaklad. Форма - НАЛОГОВЫЙ ВЫЧЕТ";
  $message = ''.$subject."\n\n\n";
  $message .= "Информация о пациенте\n";


// информация о пацианте

  $index=0;
  while(true):
      $index++;
      if($_POST["patient_{$index}"]!='')
      {
        $message.="Кому оказано лечение {$index}:  ".$_POST["patient_{$index}"]."\n";
        $message.="Фамилия пациента {$index}:  ".$_POST["pacient_familiya_{$index}"]."\n";
        $message.="Имя пациента {$index}:  ".$_POST["pacient_name_{$index}"]."\n";
        $message.="Дата рождения пациента {$index}:  ".$_POST["pacient_birthday_{$index}"]."\n";
        $message.="За какой период выдать справку {$index}:  ";
        // $message.=$_POST["patient_{$index}_"];
        foreach($_POST["patient_{$index}_"] as $item) {
          $message.= '-  '.$item . '  ';
        }
        $message.="\n";

        // if(isset($_POST["patient_{$index}_"]) && is_array($_POST["patient_{$index}_"]) && count($_POST["patient_{$index}_"]) > 0){
        //     $selectedProjects = implode( $_POST['patient_{$index}_']);
        // }



        // $message.=$selectedProjects."\n";
        if($_POST["pacient_otchestvo_{$index}"]!='' ){
          $message.="Отчество пациента {$index}:  ".$_POST["pacient_otchestvo_{$index}"]."\n";
        }
        $message.="\n\n";
     }
  if ($index==7) break;
  endwhile;


  // информация о плательщике
  $message.="\n\n\n";
  $message.="Информация о плательщике\n";
  $message.="Фамилия плательщика:  ".$_POST['custumer__familiya']."\n";
  $message.="Имя плательщика:  ".$_POST['custumer__name']."\n";
  if($_POST['custumer__ochestvo']!=''){
    $message.="Отчество плательщика:  ".$_POST['custumer__ochestvo']."\n";
  }
  $message.="ИНН:  ".$_POST['custumer__inn']."\n";
  $message.="Телефон:  ".$_POST['tel']."\n";
  $message.="Электронная почта:  ".$_POST['custumer__mail']."\n";
  if($_POST['text_area']!='' ){
    $message.="Доп. Комментарий:\n".$_POST['text_area']."\n";
  }
  $message.="\n\n\n";
  $message.=	'Откуда пришел запрос: '.$_SERVER['HTTP_REFERER'].'';







//часть, относящаяся к приложенному файлу
  $boundary = md5(date('r', time()));
  $filesize = '';
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "From: " . $from . "\r\n";
  $headers .= "Reply-To: " . $from . "\r\n";
  $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
  $message="
Content-Type: multipart/mixed; boundary=\"$boundary\"

--$boundary
Content-Type: text/plain; charset=\"utf-8\"
Content-Transfer-Encoding: 7bit

$message";
     if(is_uploaded_file($_FILES['mail_file']['tmp_name'])) {
         $attachment = chunk_split(base64_encode(file_get_contents($_FILES['mail_file']['tmp_name'])));
         $filename = $_FILES['mail_file']['name'];
         $filetype = $_FILES['mail_file']['type'];
         $filesize = $_FILES['mail_file']['size'];
         $message.="

--$boundary
Content-Type: \"$filetype\"; name=\"$filename\"
Content-Transfer-Encoding: base64
Content-Disposition: attachment; filename=\"$filename\"

$attachment";
     }
   $message.="
--$boundary--";

  if ($filesize < 10000000) { // проверка на общий размер всех файлов. Многие почтовые сервисы не принимают вложения больше 10 МБ
    mail($to, $subject, $message, $headers);
    if($mail){
      // echo 'Сообщение отправлено';
      echo json_encode(array('success'=>"successfully send", 'message'=>"Message sent."));
      $result = array('success'=>1, 'message'=>"Message sent.");
      echo 'Ваше сообщение отправлено, спасибо!';
    }
  } else {
    echo 'Извините, письмо не отправлено. Размер всех файлов превышает 10 МБ.';
  }

?>
