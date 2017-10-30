/**
 * Created by anlewo0208 on 2017/10/28.
 */
layui.define(['element','jquery'],function(exports){
    var element = layui.element,
        $ = layui.jquery,
        Tab = function(){
            this.tabConfig = {
                closed : true,
                openTabNum : undefined,
                tabFilter : "demo",
                url : undefined
            }
        };
    var tabIdIndex = 0;
    Tab.prototype.tabAdd = function(_this){
        var that = this;
        var tabFilter = that.tabConfig.tabFilter;
        tabIdIndex++;
        //新增一个Tab项
        element.tabAdd(tabFilter, {
            title: _this.text() //用于演示
            ,content: "<iframe src='/page/page"+tabIdIndex+".php' data-id='1'></frame>"
            ,id: new Date().getTime() //实际使用一般是规定好的id，这里以时间戳模拟下
        })
    }

    Tab.prototype.set = function(option){
        var _this = this;
        $.extend(true,_this.tabConfig,option);
        return _this;
    }

    var Tab = new Tab();
    exports("tabExtend",function(option){
       return Tab.set(option);
    });
});