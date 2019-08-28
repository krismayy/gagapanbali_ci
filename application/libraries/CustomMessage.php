<?php

/**
 * 
 */
class CustomMessage
{
	public function sendmsg($mobile, $message)
  {

      $msgencode = urlencode($message);
      $userkey = "q4vo19";
      $passkey = "uethqc1ls7";
      $router = "";

      $postdata = array('authkey'=>$userkey,
                'mobile'=>$mobile,
                'message'=>$msgencode,
                'router'=>$router
                );
      $url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkey&passkey=$passkey&nohp=$mobile&pesan=$msgencode";

      $ch  = curl_init();
          curl_setopt_array($ch,array(
                      CURLOPT_URL => $url,
                      CURLOPT_RETURNTRANSFER => TRUE,
                      CURLOPT_POST => TRUE,
                      CURLOPT_POSTFIELDS => $postdata
            ));

      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

      $output = curl_exec($ch);
      if (curl_errno($ch)) {
        echo "error". curl_error($ch);
      }
      curl_close($ch);
       
      ?>
        <br>respon ID Mobile : <?php echo $output; ?> pesan sukses di kirim</br>
      <?php
      echo "<script>alert('pesan berhasil di kirim');</script>";
    } 
}

