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
    //添加新窗口
    $('body').on('click','.layui-nav-tree li a',function(){
       //如果不存在子级
        if($(this).siblings().length == 0){
            addTab($(this));
        }
    });
});

function addTab(_this){
    tab.tabAdd(_this)
}