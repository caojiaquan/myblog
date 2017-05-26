<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Title</title>
    <base href="<?php echo base_url(); ?>">
    <!--<link rel="stylesheet" href="css/normalize.css">-->
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sinaFaceAndEffec.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div id="page">
    <?php include 'header.php';?>
    <div id="content">
        <div class="header-wrapper">
            <div class=".container-fluid">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <h3>
                            <?php echo $thisWeb[0] -> title;?>
                        </h3>
                       <?php echo $thisWeb[0] -> content;?>
                    </div>
                    <div class="col-md-4">
                        <?php include 'rightSingle.php';?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        <span>© 2016-2017  caojiaquan.cn 版权所有  陕ICP备17008687号</span>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<!--<script src="js/template.js"></script>-->
<script src="js/bootstrap.min.js"></script>
<script src="js/sinaFaceAndEffec.js"></script>
<script src="js/main.js"></script>
<script src="js/user.js"></script>
<script src="js/single.js"></script>
</body>
</html>