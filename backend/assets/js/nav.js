/**
 * Created by anlewo0208 on 2017/10/28.
 */
var tab;
var curWwwPath=window.document.location.href;
var pathName=window.document.location.pathname;
var pos=curWwwPath.indexOf(pathName);
var localhostPaht=curWwwPath.substring(0,pos);
layui.config({
    base : localhostPaht+str+'/js/'
}).use(['tabExtend','form','element','layer','jquery'],function () {
    // console.log(str);
    var form = layui.form,
        layer = layui.layer,
        element = layui.element,
        $ = layui.jquery;
    Tab = function() {
        this.tabConfig = {
            closed: true,
            openTabNum: undefined,
            tabFilter: "demo",
            url: undefined
        }
    }
    tab = layui.tabExtend({
        openTabNum : "50",  //最大可打开窗口数量
        url : "hahahahah" //获取菜单json地址
    });
    var that = this;
    var t_m = "top-menu",
        l_a = $(".layui-side-scroll ul");
    //添加新窗口
    var tabIdIndex;
    $('body').on('click','.layui-nav-tree li a',function(){
        //如果不存在子级
        if($(this).siblings().length == 0){
            _this = $(this);
            tabIdIndex=_this.data('id');
            // var tabFilter = that.tabConfig.tabFilter;
            element.tabAdd('demo', {
                title: _this.text() //用于演示
                ,content: "<iframe src='"+_this.data('url')+"' data-id='"+tabIdIndex+"'></frame>"
                ,id: tabIdIndex //实际使用一般是规定好的id，这里以时间戳模拟下
            });
            element.tabChange('demo',tabIdIndex); //切换到当前选项卡
        }
    });
    element.on("nav("+t_m+")",function(data){
        var tagName = $(this).get(0).tagName;
        //layjs的写法，获取lay-filter元素
        l_a.hide();

        $('.' + $(this).data('left')).show();
    });

});