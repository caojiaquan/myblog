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
    <link rel="stylesheet" href="css/letter.css">
</head>
<body>
<div id="page">
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
                        <a class="navbar-brand" href="#">Brand</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="https://caojiaquan.github.io/my-website/index">关于</a></li>
                            <li><a href="letter/index">留言</a></li>
                            <li><a href="welcome/sayLittle">本站</a></li>
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
        <span>现在的位置:首页<?php if(isset($flag)){
                echo '/ '.$flag;
            }?></span>
        </div>
    </div>
    <div id="content" >
        <div class="header-wrapper">
            <div class=".container-fluid"  id="app">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div>
                            <input type="text" name="username" id="name" class="form-control" v-model="letter" placeholder="输入留言">
                            <button id="post_letter" @click="callback()" class="btn btn-primary">发送留言</button>
                            <div id="letter">
                                <div id="letter-zhu"></div>
                                <span id="letter-top"></span>
                                <span id="letter-bottom"></span>

                                <div class="letter-list-box" v-for="letter in letterList">
                                    <span class="orderBy">#{{letter.msg_id}}</span>
                                    <div class="letter-list">
                                        <span class="letter-dash"></span>
                                        <img src="images/1.jpg" alt="">
                                        <div class="letter-rightbox">
                                            <div class="letter-rightbox-top">
                                                <h3>{{letter.username}}</h3>
                                                <span>{{letter.post_date}}</span>
                                            </div>
                                            <div class="letter-content">
                                                {{letter.content}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav aria-label="Page navigation" id="pageNav">
                            <ul class="pagination">
                                <li>
                                    <a  class="previous" aria-label="Previous" @click="prepage()">
                                        <span class="previous" aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li v-for="page in pageNum"><a class="pageButton"  @click="changepage(page)">{{page}}</a></li>
                                <li>
                                    <a class="next" aria-label="Next" @click="nextpage()">
                                        <span class="next" aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-md-4">
                        <?php include 'rightSingle.php';?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'model.php';?>
    <?php include  'registModel.php';?>
    <div id="footer">
        <span>© 2016-2017  caojiaquan.cn 版权所有  陕ICP备17008687号</span>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<!--<script src="js/template.js"></script>-->
<script src="js/bootstrap.min.js"></script>
<script src="js/sinaFaceAndEffec.js"></script>
<!--<script src="js/main.js"></script>-->
<script src="js/user.js"></script>
<script src="js/single.js"></script>
<script src="js/axios.min.js"></script>
<script src="js/vue.min.js"></script>



<script>
    var vm = new Vue({
        el:"#app",
        data:{
            letter:'',
            letterList:[],
            Nopage:1,
            isEnd:false,
            pageNum:1,
            pageButton:'pageButton'
        },
        mounted:function(){
            this.init();

        },
        methods:{
            init:function(){
                var _this = this;
                axios.get("letter/get_letter", {
                    params: {
                        Nopage:_this.Nopage
                    }
                }).then(function (res) {
                    _this.letterList = res.data.result;
                    _this.isEnd = res.data.isEnd;
                    _this.pageNum = res.data.pageNum;
                });

            },
            addLetter:function(){
                var _this =this;
                axios.get('letter/add_letter', {
                    params: {
                        msg:_this.letter
                    }
                })
                    .then(function (response) {
                        _this.init();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            callback:function(){
                var _this = this;
                user.checkLogin(function(){
                    _this.addLetter();

                },function(){

                    $('#myModal').modal('toggle');
                });
            },
            changepage:function(page){
                this.Nopage = page;
                this.init();
//                buttoncolor();

            },
            prepage:function(){
                if(this.Nopage ==1 ){

                }else{
                    this.Nopage--;
                    this.init();
                }

            },
            nextpage:function(){
                if(this.Nopage == this.pageNum){

                }else{
                    this.Nopage++;
                    this.init();
                }

            },
        }

    });
    var opageNav = document.getElementById('pageNav');//获取父元素
    var aPageButton = document.getElementsByClassName('pageButton');//分页中间的类似1,2,3....的那些元素
    var ele = aPageButton[0];
    ele.index = 0;

    aPageButton[0].className = 'pageButton selected';
        opageNav.onclick = function(e) {//事件委托，后生成元素给父元素统一绑定
            if (e.target.className == 'pageButton') {
                for (var i = 0; i < aPageButton.length; i++) {
                    aPageButton[i].className = 'pageButton';
                    aPageButton[i].index = i;//给每个按钮自定义属性
                }
                e.target.className = 'pageButton selected';
                ele=e.target;
            }
            if(e.target.className == 'previous'){//点击上一页
                console.log(ele.index);
                for (var i = 0; i < aPageButton.length; i++) {
                    aPageButton[i].className = 'pageButton';
                }
                if(ele.index != 0){
                    ele.index--;
                    aPageButton[ele.index].className = 'pageButton selected';
                }else{
                    aPageButton[0].className = 'pageButton selected';
                }
            }
            if(e.target.className == 'next'){//点击下一页
                for (var i = 0; i < aPageButton.length; i++) {
                    aPageButton[i].className = 'pageButton';
                }
                if(ele.index != aPageButton.length-1){
                    ele.index++;
                    aPageButton[ele.index].className = 'pageButton selected';
                }else{
                    aPageButton[aPageButton.length-1].className = 'pageButton selected';
                }
            }
        };
</script>
</body>
</html>