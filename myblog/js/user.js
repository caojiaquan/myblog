/**
 * Created by Administrator on 2017/5/13 0013.
 */
var user = (function(){
    var user = {
        init:function(){
            var flag1 = false;
            var flag2 = false;
            var flag3 = false;
            var flag4 = false;
            var that = this;
            $("#login").on('click',function(){
                $('#myModal').modal('show');
                console.log(123);
            });
            $(".btn.btn-primary").on('click',function(){//点击提交登录
                that.login();
            });
            $(".radieSex").on('blur',function(){
                if($(".radieSex:checked").val()  == ''){
                    alert('请选择性别');
                }else{
                    flag4 =true;
                }

            });
            $(".btn.btn-regist").on('click',function(){//打开注册页
                $('#myModal').modal('hide');//关闭登录页面
                $("#registModal").modal('show');//打开注册页面
            });
            $("#registName").on('blur',function(){
                if($(this).val().length  == 0){
                    alert('用户名不能为空');
                }else{
                    flag1 = true;
                }
            });
            $("#registPass").on('blur',function(){
                if($(this).val().length ==0){
                    alert('密码不能为空');
                }else{
                    flag2 = true;
                }
            });
            $("#registPass1").on('blur',function(){
                if($(this).val() == $("#registPass").val()){
                    flag3 = true;
                }else{
                    alert('两次输入密码不一致');
                }
            });

                $(".btn.btn-loginRegist").on('click',function(){//提交注册
                    if(flag1 && flag2 && flag3 && flag4){
                        that.regist();
                    }else{
                        alert('请完善信息');
                    }
                });
            this.tagcolor();
            this.scroll();
            $("#contact-qq").on('click',function(){
                $("#qqModal").modal('show');
            });
            $("#contact-weixin").on('click',function(){
                $("#weiModal").modal('show');
            });
        },
        regist:function(){
            var name = $("#registName").val();
            var pass = $("#registPass").val();
            var pass1 = $("#registPass1").val();
            var sex = $(".radieSex:checked").val();
            var option = {};
            option.name = name;
            option.pass = pass;
            option.pass1 = pass1;
            $.post('user/regist',option,function(data){
                console.log(data);
                if(data == 'success'){
                    alert('注册成功，赶快登录');
                    $("#registModal").modal('hide');//关闭注册页面
                    $('#myModal').modal('show');//打开登录页面
                }else{
                    alert('注册失败，请重试或联系管理员');
                }
            },'text');
        },
        login:function(){
            var name = $("#name").val();
            var pass = $("#pass").val();
            var option = {};
            option.name = name;
            option.pass = pass;
            $.post('user/login',option,function(data){
                if(data == 'success'){
                    $('#myModal').modal('hide');
                    alert('登录成功');
                    location.href = 'welcome/index';
                }else{
                    alert('用户名或密码错误');
                }
            },'text');
        },
        checkLogin:function(success,fail){
            $.get("user/check_login",function(data){
                if(data == 'success'){
                    success();
                }else{
                    fail();
                }
            },'text');
        },
        tagcolor:function(){
            var arr = ['#f0ad4e','#0000FF','#00ff00','#f00','#31708f','#428bca'];
            $("#article-tag a").each(function(index){
                if(index <= arr.length){
                    $(this).css('background',arr[index%6]);

                }else{
                    $(this).css('background',arr[index%6]);
                }

            });
        },
        scroll:function(){
            $(window).on('scroll',function(){
                var flag = false;
                if($(document).scrollTop() > 100){
                    flag = true;
                }
                if($(document).scrollTop()< 100){
                    flag = false;
                }
                if(flag){
                    $("#header").addClass('scroll');
                    $("#top-menu").addClass('scroll');
                    $(".nav.navbar-nav.navbar-right,.niuren").removeClass('scroll');

                }else{
                    $("#header").removeClass('scroll');
                    $("#top-menu").removeClass('scroll');
                    $(".nav.navbar-nav.navbar-right,.niuren").addClass('scroll');

                }
            });
        }

    };
    return user;
})();
user.init();