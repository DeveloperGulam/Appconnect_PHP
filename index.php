<?php
    // ini_set('max_execution_time', 0);
    set_time_limit(900000);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">
  <title>NIGP - Chapter Uploading Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="assets/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
<div class="overlay">
    <div class="login">
      <div class="login__inner">
        <div class="login__header">
          <div class="login__title">
            <h1 class="login__heading"><img src="assets/nigp.png" style="height: 50px;"></h1>
          </div>
        </div>
        <div class="login__content">
          <div class="login__form">
            <form action="" enctype="multipart/form-data" method="post" class="form">
              <div class="form__group">
                <select class="form__input" name="chapter" required>
                  <option>Select Chapter</option>
                  <option value="1">IAPPO - Config 1</option>
                  <option value="2">RMGPA - Config 2</option>
                  <option value="1">TAPP - Config 1</option>
                  <option value="3">SELA - SELA Active and pending MembershipsUpdated - Config 3</option>
                  <option value="2">SELA - Inactive membershiplist - Config 2</option>
                  <option value="4">RMGPA - Config 4</option>
                  <!-- <option value="5">Tampa Bay - Config 5</option> -->
                  <option value="6">Tampa Bay - Config 5</option>
                </select>
              </div>
              <div class="form__group">
                <input class="form__input" type="file" name="file" required>
              </div>
              <div class="form__group">
                <input class="form__input" type="email" name="email" placeholder="Email Id" required>
              </div>
              
              <?php
              function escape_string($value) {
                $return = '';
                for($i = 0; $i < strlen($value); ++$i) {
                    $char = $value[$i];
                    $ord = ord($char);
                    if($char !== "'" && $char !== "\"" && $char !== '\\' && $ord >= 32 && $ord <= 126){
                      $return .= $char;
                    } else {
                        if($char !== '"' || $char !== "\""){
                          $return .= "'";
                        //   $value[$i] = "'";
                        }  else {
                          $return .= $char;
                        }
                    }
                }
                $return = str_replace("'''", "'", $return);
                $return = str_replace("''", "\n", $return);
                return $return;
              }
    if(isset($_POST['submit'])){
        
        if($_POST['chapter'] == 1){
            // $destination_file = "nigp/source/";

            //dev env
            $api_url = "https://d97206cb.us-south.apigw.appdomain.cloud/doU7q8/nigpChapter1/getTransformedFile";
            $api_key = '93144deb-1e18-440c-9547-d5041cc28868';

            //prod env
            // $api_url = "https://dc726e88.us-south.apigw.appdomain.cloud/OFA7TN/nigpChapter1/getTransformedFile";
            // $api_key = "5cb7e50c-8ce5-4dc7-875e-6f8659070648";
        }
        elseif($_POST['chapter'] == 2) {
            // $destination_file = "nigp/source/chapter2/";

            //dev env
            $api_url = "https://d97206cb.us-south.apigw.appdomain.cloud/LVkc7e/nigpChapter2/getTransformedFile";
            $api_key = 'acef02eb-39c2-48cc-81d1-e21a439f1a29';

            //prod env
            // $api_url = "https://dc726e88.us-south.apigw.appdomain.cloud/mQwY3D/nigpChapter2/getTransformedFile";
            // $api_key = "921cd1b9-7b79-4aaf-8488-ee7bf34fa749";
        }

        elseif($_POST['chapter'] == 3) {
          // $destination_file = "nigp/source/chapter3/";

          //dev env
          $api_url = "https://d97206cb.us-south.apigw.appdomain.cloud/Hv64VV/nigpChapter3/getTransformedFile";
          $api_key = '0066b4f0-64a5-460a-8aa0-fa5f2d2e2520';

          //prod env
          // $api_url = "https://dc726e88.us-south.apigw.appdomain.cloud/7FcEPO/nigpChapter3/getTransformedFile";
          // $api_key = "a9dc6968-19b9-4bb8-8e8d-be0ff73159ef";
        }

        elseif($_POST['chapter'] == 4) {
          // $destination_file = "nigp/source/chapter3/";

          //dev env
          $api_url = "https://d97206cb.us-south.apigw.appdomain.cloud/RjXu3b/nigpChapter4/getTransformedFile";
          $api_key = 'bb0dbe62-4157-48fb-a784-2c325d608ff1';

          //prod env
          // $api_url = "https://dc726e88.us-south.apigw.appdomain.cloud/zYOsC6/nigpChapter4/getTransformedFile";
          // $api_key = "3060d13f-bf85-481d-90f8-067772236f90";
        }

        elseif($_POST['chapter'] == 5) {
          // $destination_file = "nigp/source/chapter3/";

          //dev env
          $api_url = "https://d97206cb.us-south.apigw.appdomain.cloud/SkIRwp/nigpConfig5/getTransformedFile";
          $api_key = 'e65a81d8-f2cf-4ce2-b233-2451545e953d';

          //prod env
          // $api_url = "https://dc726e88.us-south.apigw.appdomain.cloud/zYOsC6/nigpChapter4/getTransformedFile";
          // $api_key = "3060d13f-bf85-481d-90f8-067772236f90";
        }
        
        elseif($_POST['chapter'] == 6) {
          // $destination_file = "nigp/source/chapter3/";

          //dev env
          // $api_url = "https://d97206cb.us-south.apigw.appdomain.cloud/koNWdb/nigpChapter5/getTransformedFile";
          // $api_key = 'b52135ea-293f-48c4-8097-c6265bb2c83c';

          //prod env
          $api_url = "https://dc726e88.us-south.apigw.appdomain.cloud/YwX3rc/nigpChapter5/getTransformedFile";
          $api_key = "cccc9d6b-4e96-4224-a42f-52f2595c14fa";
        }

        $mimes = array('application/vnd.ms-csv','text/csv');
        if(in_array($_FILES['file']['type'], $mimes)){
          $upload_dir=getcwd().DIRECTORY_SEPARATOR.'/uploads';
          if($_FILES['file']['error']==UPLOAD_ERR_OK)
          {
    		    $email_id = $_POST['email'];
            $tmp_name=$_FILES['file']['tmp_name'];
            $name=basename($_FILES['file']['name']);
            $csvfile = $upload_dir.'/'.$name;
            move_uploaded_file($tmp_name,$csvfile);
            $csv_string = file_get_contents($csvfile);
            $new_csv_string = escape_string($csv_string);
            $post_data = array(
                    'fileName' => $name,
                    'fileData' => $new_csv_string,
                    'emailAddresses' => $email_id
                );
              
                $json_data = json_encode($post_data);
                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => $api_url,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'POST',
                  CURLOPT_POSTFIELDS => $json_data,
                  CURLOPT_HTTPHEADER => array(
                    'X-IBM-Client-Id: '.$api_key,
                    'Content-Type: application/json'
                  ),
                ));
                
                $response = curl_exec($curl);
                curl_close($curl);
                $arrResponse = json_decode($response);
            
                // $file = fopen('./target/'.$name,"w");
                // $writed = fwrite($file, $arrResponse->fileResponse);
                // fclose($file);
                if(empty($arrResponse->error)){
                    ?>
                    <p style="color:green;margin-bottom:20px;margin-top:-20px;">File Uploaded Successfully. CSV file will be emailed after the processing.</p>
                    <p style="color:red;margin-bottom:20px;margin-top:-20px;">Note: Don't process the next file until you have received the email of the current resource file or try after 10 minutes.</p>
                    <!--<a href="./target/<?= $name ?>" download="<?= $name ?>" >Download File</a>-->
                  <script>
                      toastr.success('File Uploaded Successfully. File will be emailed after processing it.');
                  </script>
                  <?php
                } else {
                  $to = $email_id;
                  $from = "gulam.gaus@zorang.com"; // this is the sender's Email address
                  $subject = "NIGP App Connect Response";
                  $message = "Hi Team, <br/>There is a problem with your file.<br/>Please contact with Astha.<br/><br/>Regards,<br/>Zorang Team";

                  //standard mail headers
                  $headers = "From: Gulam Gaus ".$from."\r\n";
                  $headers .= "MIME-Version: 1.0\r\n";
                  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                  mail($to,$subject,$message,$headers);
                  ?>
                  <p style="color:red;margin-bottom:20px;margin-top:-20px;">Something went to wrong. please check your email or try again later.</p>
                  <!-- <p style="color:red;margin-bottom:20px;margin-top:-20px;"><?= $arrResponse->error->message ?></p> -->
                  <script>
                      toastr.error('API response failed.');
                  </script>
                  <?php
                }
    		} else {
    		    ?>
                <script>
                  toastr.error("Sorry, can't proccess this file.");
                </script>
              <?php
    		}
        } else {
          ?>
            <script>
              toastr.error('Sorry, this file type not allowed, please upload CSV file only.');
            </script>
          <?php
        }
    }
    
    ?>
              <div class="form__group">
                <button class="form__btn" type="submit" name="submit">
                  <span class="form__btn-text">Upload File</span>
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="login__footer">
          <div class="login__subtitle">
            <h3 class="login__subheading">© 2020 NIGP. All Rights Reserved.</h3>
          </div>
        </div>
      </div>
    </div>
</div>
<script  src="assets/script.js"></script>
</body>
</html>