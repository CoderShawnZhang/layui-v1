/**
 * Created by anlewo0208 on 2017/10/28.
 */
var tab;
layui.config({
   base : "/assets/js/"
}).use(['tabExtend','form','element','layer','jquery'],function () {

    var form = layui.form,
        layer = layui.layer,
        element = layui.element,
        $ = layui.jquery;
        tab = layui.tabExtend({
            openTabNum : "50",  //最大可打开窗口数量
            url : "" //获取菜单json地址
        });
        var t_m = "top-menu",
            l_a = $(".layui-side-scroll ul");
    //添加新窗口
    $('body').on('click','.layui-nav-tree li a',function(){
       //如果不存在子级
        if($(this).siblings().length == 0){
            addTab($(this));
        }
    });
    element.on("nav("+t_m+")",function(data){
        var tagName = $(this).get(0).tagName;
        //layjs的写法，获取lay-filter元素
        l_a.hide();

        $('.' + $(this).data('left')).show();
    });

});

function addTab(_this){
    tab.tabAdd(_this)
}