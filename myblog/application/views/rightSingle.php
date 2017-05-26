<?php $articleList = $this -> session -> userdata('articleList');?>
    <div id="content-right-box">

        <div id="search">
            <input type="text" placeholder="输入搜索内容"><span>搜索</span>
        </div>
        <div id="article-tag" class="clearfix">
            <?php foreach ($articleList as $article){?>
                <a href="welcome/get_article_detail?id=<?php echo $article->article_id;?>"><?php echo $article -> title;?></a>
            <?php }?>

        </div>
        <div id="contact" >
            <div><a class="fa fa-github-square" href="https://www.github.com/caojiaquan"></a></div>
            <div id="contact-qq"><a class="fa fa-qq" href="javascript:void(0);"></a></div>
            <div id="contact-weixin"><a class="fa fa-weixin" href="javascript:void(0);"></a></div>
        </div>
        <div id="artical-list">
            <ul>
                <li>
                    <h3>文章分类</h3>
                </li>
                <li><a href="welcome/index?type_id=1">css</a><a href="welcome/index?type_id=2">js</a></li>
                <li><a href="welcome/index?type_id=3">jquery</a><a href="welcome/index?type_id=4">底层原理</a></li>
                <li><a href="welcome/index?type_id=5">前端框架</a><a href="welcome/index?type_id=6">后端框架</a></li>
                <li><a href="welcome/index?type_id=7">php</a><a href="welcome/index?type_id=8">node</a></li>
                <li><a href="welcome/index?type_id=9">其他</a><a href="welcome/index?type_id=10">工具类</a></li>
            </ul>
        </div>
        <div id="random-list">
            <ul>
                <li>
                    <h3>最新文章</h3>
                </li>

                <?php foreach($articleDesc as $article){?>
                    <li><a href="welcome/get_article_detail?id=<?php echo $article->article_id;?>"><?php echo $article->title;?></a></li>
                <?php }?>
            </ul>
        </div>
        <div id="new-comment">
            <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">最新留言</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">最新评论</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">最多点击</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <ul class="comm-submenu">
                            <?php foreach($leaveMsg as $msg){?>
                                <li><a href="letter/index"><?php echo $msg->username; ?> : <?php echo $msg->content;?></a></li>
                            <?php }?>


                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <ul class="comm-submenu">
                            <?php foreach ($articleMmoreComm as $comm){?>
                                <li><a href="welcome/get_article_detail?id=<?php echo $comm-> article_id?>"><?php echo $comm-> title?></a></li>
                            <?php }?>


                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">
                        <ul class="comm-submenu">
                            <?php foreach ($articleClick as $click){?>
                                <li><a href="welcome/get_article_detail?id=<?php echo $click-> article_id?>"><?php echo $click-> title?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </div>
