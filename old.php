<?php
    // require 'vendor/autoload.php';
    // use phpseclib3\Net\SFTP;
    // use phpseclib3\Net\SSH2;
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
                  <option value="1">Chapter 1</option>
                  <option value="2">Chapter 2</option>
                </select>
              </div>
              <div class="form__group">
                <input class="form__input" type="file" name="file" required>
              </div>
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

    <?php
    if(isset($_POST['submit'])){
        if($_POST['chapter'] == 1){
            $destination_file = "nigp/source/";
        }
        elseif($_POST['chapter'] == 2) {
            $destination_file = "nigp/source/chapter2/";
        }

        $mimes = array('application/vnd.ms-csv','text/csv');
        if(in_array($_FILES['file']['type'], $mimes)){
          $source_file = $_FILES['file']['name'];
          $source_tmp = $_FILES['file']['tmp_name'];

          $upload_file_name = $destination_file . $source_file;

          $sftp = new phpseclib3\Net\SFTP('44.194.99.49');
          if (!$sftp->login('ftpuser', 'N!gpFtp@20@2')) {
              exit('Login Failed');
          }

          $upload = $sftp->put($upload_file_name, $source_tmp, SFTP::SOURCE_LOCAL_FILE);
          
          if (!$upload) { 
              ?>
              <script>
                  toastr.error('FTP upload has failed!');
              </script>
              <?php
          } else {
              ?>
              <script>
                  toastr.success('File Uploaded Successfully.');
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
    <script  src="assets/script.js"></script>
</body>
</html>