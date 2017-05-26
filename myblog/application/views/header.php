<?php
    $userLogin = $this -> session -> userdata('userLogin');
?>
<div id="header" data-type="<?php if(isset($typeId)){echo $typeId;};?>">
    <div class="header-wrapper">
        <ul class="clear-fix" id="top-menu">
            <li id="first-page"><a href="">首页</a></li>
            <li id="user-profile">
                <?php if($userLogin){?>
                    <span><a href=""><?php echo $this -> session -> userdata('userLogin') -> username;?></a></span>
                <?php }else{?>
                    <span>欢迎登陆！</span>
                    <a href="javascript:void(0)" id="login">登录</a>
                <?php }?>

            </li>
        </ul>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a   id='logop' class="niuren scroll" href="#"><img id="logo" src="images/logo.png" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right scroll" >
                        <li><a href="https://caojiaquan.github.io/my-website/index">关于</a></li>
                        <li><a href="letter/index">留言</a></li>
                        <li><a href="welcome/sayLittle">本站</a></li>
<!--                        push_article-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">分类<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="welcome/index?type_id=2">js</a></li>
                                <li><a href="welcome/index?type_id=1">css</a></li>
                                <li><a href="welcome/index?type_id=3">jquery</a></li>
                                <li><a href="welcome/index?type_id=4">底层原理</a></li>
                                <li><a href="welcome/index?type_id=5">前端框架</a></li>
                                <li><a href="welcome/index?type_id=6">后端框架</a></li>
                                <li><a href="welcome/index?type_id=7">php</a></li>
                                <li><a href="welcome/index?type_id=8">node</a></li>
                                <li><a href="welcome/index?type_id=9">其他</a></li>
                                <li><a href="welcome/index?type_id=10">工具类</a></li>

                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</div>
<div class="header-wrapper">
    <div id="now-path">
        <span>现在的位置:首页<?php if(isset($articleDetail)){
                echo '/ '.$articleDetail['article']->type_name;
            }?></span>
    </div>
</div>
<?php include 'model.php'; ?>
<?php include 'registModel.php'; ?>
<?php include 'qqmodel.php' ;?>
<?php include 'weiModel.php' ;?>


