/**
 * Created by Administrator on 2017/5/11 0011.
 */
$(function(){
    var articleComp = (function(){
        var Article = function(title,content,postdate,msg,type,img,click,id,tag){//创建一个文章类
            this.title = title;
            this.content = content;
            this.postdate = postdate;
            this.msg = msg;
            this.type = type;
            this.img = img;
            this.click = click;
            this.id=id;
            this.tag = tag;
        };
        var articleComp = {
            pageNo:1,
            isEnd:false,//用来标识分页数据没有加载完
            isloaded:false,//标识数据有没有加载完成
            init:function(){
                var _this = this;
                this.loadData();//先加载一批数据
                $(window).on('scroll',function(){
                    if(($(window).height() + $(window).scrollTop()) - $(document).height() >=0){
                        $("#loading").show();
                        _this.loadMore();
                    }
                });

                $("#btn").on('click',function(){//加载更多的文章
                    if(_this.isloaded){
                        _this.loadMore();
                    }
                });
            },
            loadData:function(){

                var type = parseInt($("#header").data('type'));//加载前判断是否有传过来文章类型，标识用类型查文章
                var _this = this;
                var option = {};
                option.pageNo = this.pageNo;
                option.type = type;
                $.get('welcome/get_article',option,function(data){
                    var data1 = data;
                    _this.isEnd = data1.isEnd;
                    data = data1.results;
                    for(var i=0; i<data.length; i++){
                        var newArtilce = new Article(data[i].title,data[i].content,data[i].post_date,data[i].msg,data[i].type_name,data[i].img,data[i].click,data[i].article_id,data[i].tag);
                        newArtilce.content = newArtilce.content.slice(0,100);//截取内容的长度
                        newArtilce.title = newArtilce.title.slice(0,50);
                        var templateHtml = template('template',newArtilce);
                        $article = $(templateHtml);
                        $article.data('article',newArtilce);
                        $('.content-mainbox').append($article);
                        $("#loading").hide();
                    }
                    _this.isloaded = true;

                },'json');
            },
            loadMore:function(){
                var _this = this;
                if(this.isEnd){
                    $("#loading").hide();
                    // alert('没有数据了');
                }else{
                    this.pageNo++;
                    this.loadData(function(){
                        _this.isloaded = true;
                    });
                }
            }

        };
        return articleComp;
    })();
    articleComp.init();

});