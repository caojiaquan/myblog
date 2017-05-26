<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>追梦赤子心</title>
    <meta name="discription" content="学习过程中的一些总结和一些对自己启发比较大的文章的转载,欢迎来访-">
    <meta name="keywords" content="前端,技术,axio,ajax,php,js,node,后端,vue">
    <base href="<?php echo base_url(); ?>">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
    <link href="css/iconfont.css" rel="stylesheet" type="text/css"/>
    <link href="css/fileUpload.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="page">
    <?php include 'header.php'; ?>
    <div id="content">
        <div class="header-wrapper">
            <div class=".container-fluid">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="content-mainbox">

                        </div>
                        <div id="loading">
                            <img src="images/loading.gif" alt="">
                        </div>
<!--                        <div id="single-more">-->
<!--                            <span id="btn">加载更多</span>-->
<!--                        </div>-->
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

<script id="template" type="html">
    <div class="content-box">
        <div class="content-left">
        <a href="welcome/get_article_detail?id={{id}}">

        <img src="{{img}}" alt="">
        </a>
        </div>
        <div class="content-right">
        <div>
        <div class="content-title"><h3><a href="welcome/get_article_detail?id={{id}}">{{title}}</a></h3></div>
    <div class="content-news">
        {{content}}
    </div>
    <div class="content-info">
        <span class="content-date">{{postdate}}</span>
    <span class="content-views">阅读次数 {{click}} 次</span>
    <span class="content-comm"><a href="welcome/get_article_detail?id={{id}}">发表评论</a></span>
        </div>
        </div>
        </div>
        <span class="tag">{{type}}</span>
        <span class="content-view-all"><a href="welcome/get_article_detail?id={{id}}">阅读全文</a></span>
        <span class="my-article">{{tag}}</span>
        </div>
</script>

<script src="js/jquery.min.js"></script>
<script src="js/template.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/user.js"></script>
<script src="js/index.js"></script>
</body>
</html>