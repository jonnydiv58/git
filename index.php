<?php
declare(strict_types=1);
session_start();
require "vendor/autoload.php";

$secret = 'XVQ2UIGO75XRUKJO';
$link =  \Sonata\GoogleAuthenticator\GoogleQrUrl::generate('arof', $secret, 'git');
$g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();

if(isset($_POST['submit'])){
    $code = $_POST['code'];

    if ($g->checkCode($secret, $code)) {

         $_SESSION['authenticated'] = "code";
         header("location:auth.php");
    } else {
        echo "code is wrong";
    }
}
?>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <title>Document</title>
</head>
<body>
   <div class="container">
    <div class="row mx-auto">
        <div class="box">
          <img src="<?php echo $link; ?>" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Code:</label>
                            <input type="text" name="code" required class="form-control" placeholder="Enter Code">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class=" mt-4">
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                 </div>
                </div>
            </form>
        </div>
    </div>
   </div>
</body>
</html>
