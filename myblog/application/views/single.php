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
    <div id="content"  data-id="<?php echo $articleDetail['article'] -> article_id?>">
        <div class="header-wrapper" id="Appcomm">
            <div class=".container-fluid">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12" id="callba">
                        <div id="single-box">
                            <div id="single-left-box" class="clear-fix">
                                <div id="single-header-top">
                                    <span class="go-menu"><a href="">回到首页</a></span>
                                    <div id="single-header-right">
<!--                                        <span class="go-comm">发表评论</span>-->
                                        <span class="go-view"><?php echo $articleDetail['article'] -> click;?> views</span>
                                        <img src="images/next.png" alt="" title="全屏观看" @click="btn" id="imgNext">
                                    </div>
                                </div>
                                <h1>
                                    <?php echo $articleDetail['article'] -> title;?>
                                </h1>
                                <p>
                                    <?php echo $articleDetail['article'] -> content;?>
                                </p>
                            </div>
                            <div id="single-bottom">
                                <span>发布日期 : <?php echo $articleDetail['article'] -> post_date;?></span>
                                <span>所属分类：<?php echo $articleDetail['article'] -> type_name;?></span>
                            </div>
                            <div id="single-title">
                                <span>评论区</span>
                            </div>
                            <div id="single-comment">
                                <div class="single-comm" v-for="(v,k) in commList">
                                    <span class="comm-num" v-text="">#{{k}}</span>
                                    <div class="comm-left">
                                        <img src="images/1.jpg" alt="" >
                                    </div>
                                    <div class="comm-body">
                                        <div class="comm-body-top">
                                            <span>{{v.username}}</span>
                                            <span v-if="v.sex == 1">男</span>
                                            <span v-else>女</span>
                                            <span>{{v.post_date}}</span>
                                        </div>
                                        <div class="comm-body-bot">
                                            <div class="comm-body-content">
                                                {{v.content}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
<!--                            <div id="single-more">-->
<!--                                <span>加载更多</span>-->
<!--                            </div>-->
                            <div id="well" class="clear-fix">
                                <div>
                                    <div class="wrap">
                                        <div class="comment clear-fix">
                                            <div class="content">
                                                <div class="cont-box">
                                                    <textarea class="text" placeholder="请输入..." v-model="letter"></textarea>
                                                </div>
                                                <div class="tools-box">
                                                    <div class="operator-box-btn"><span class="face-icon"  >☺</span><span class="img-icon">▧</span></div>
                                                    <div class="submit-btn"><input @click="callback" type="button" value="提交评论" /></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="info-show">
                                            <ul></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </div>
</div>
<div class="col-md-4" id="call-right">
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
<script src="js/bootstrap.min.js"></script>
<script src="js/sinaFaceAndEffec.js"></script>
<script src="js/main.js"></script>
<script src="js/user.js"></script>
<script src="js/single.js"></script>
<script src="js/axios.min.js"></script>
<script src="js/vue.min.js"></script>

<script>
    var vm = new Vue({//留言列表用vue接管作用域
        el:"#Appcomm",
        data:{
            letter:'',
            bFlag:false,
            commList:[]//留言列表
        },

        mounted:function(){
            this.init();
        },
        methods:{
            init:function(){
                var _this = this;
                axios.get("welcome/get_comm",{
                    params:{
                        id : $("#content").data('id')
                    }
                }).then(function (res) {
                    _this.commList = res.data.comments;
                });

            },
            postMessage:function(){
                var _this =this;
                console.log(789);
                var params = new URLSearchParams();
                params.append('content',_this.letter);
                params.append('id',$("#content").data('id'));
                axios.post('welcome/post_message',params)
                    .then(function(response){
                        _this.init();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            callback:function(){
                var _this = this;
                user.checkLogin(function(){
                    _this.postMessage();
                },function(){
                    $('#myModal').modal('toggle');
                });
            },
            btn:function(){

                if(!this.bFlag){
                    $("#call-right").removeClass('col-md-4');
                    $("#callba").removeClass('col-md-8').addClass('col-md-12');
                    $("#imgNext").addClass('rotate');
                }else{
                    $("#call-right").addClass('col-md-4');
                    $("#callba").addClass('col-md-8').removeClass('col-md-12');
                    $("#imgNext").removeClass('rotate');
                }
                this.bFlag = !this.bFlag;
            }//伸缩按钮的控制

        }

    });
</script>
</body>
</html>