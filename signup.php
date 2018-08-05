<?php include ("db_connect.php");

        error_reporting(E_ALL);
        ini_set('display_errors', 1);
 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             
            $filename = $_FILES['file']['name'];
            $tmpName  = $_FILES['file']['tmp_name'];
            $error    = $_FILES['file']['error'];
            $size     = $_FILES['file']['size'];
            $ext      = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            $petName=$_POST['name'];
            $breed=$_POST['breed'];
            $birthday=$_POST['birthday'];
            $gender=$_POST['gender'];
            $spayed=$_POST['spayed'];
            $weight=$_POST['weight'];
            $date = date('Y-m-d H:i:s');

            $cardHolder=$_POST['card-holder-name'];
            $cardNumber=$_POST['card-number'];
            $expDay=$_POST['exp-day'];
            $expMonth=$_POST['exp-month'];
            $cvc=$_POST['cvc'];
            $saveCard=$_POST['save-card'];         
           
            switch ($error) {
                case UPLOAD_ERR_OK:
                    $valid = true;

                    if ( !in_array($ext, array('jpg','jpeg','png', 'gif')) ) {
                        $valid = false;
                        $response = 'Invalid file extension.';
                    }

                    if ( $size/1024/1024 > 2 ) {
                        $valid = false;
                        $response = 'File size is exceeding maximum allowed size.';
                    }

                    if ($valid) {
                        $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'uploads' . DIRECTORY_SEPARATOR. $filename;
                        move_uploaded_file($tmpName,$targetPath);

                        header( 'Location: index.php' ) ;
                        
                        $sql1="INSERT INTO `pets` (`name`, `breed`, `file`, `gender`, `spayed`, `birthday`, `weight`, `dateposted`) VALUES ('$petName', '$breed', '$filename', '$gender', '$spayed', '$birthday', '$weight', '$date')";

                        $sql2="INSERT INTO `payment` (`card-holder-name`, `card-number`, `exp-day`, `exp-month`, `cvc`) VALUES ('$cardHolder', '$cardNumber', '$expDay', '$expMonth', '$cvc')";
                       
                        $result1=mysqli_query($conn,$sql1) or die(mysql_error());

                        if (isset($saveCard)) {
                         $result2=mysqli_query($conn,$sql2) or die(mysql_error());
                        }
                        
                        exit;
                    }
                    break;
                case UPLOAD_ERR_INI_SIZE:
                    $response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $response = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $response = 'The uploaded file was only partially uploaded.';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $response = 'No file was uploaded.';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $response = 'File upload stopped by extension. Introduced in PHP 5.2.0.';
                    break;
                default:
                    $response = 'Unknown error';
                break;
            }
 
            echo $response;
        }
        ?>