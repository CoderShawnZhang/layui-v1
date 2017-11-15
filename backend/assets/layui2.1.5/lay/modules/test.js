/**
 * Created by zhanghongbo on 17/10/31.
 */
layui.define(['element','jquery'],function(exports){
    var element = layui.element,
        $ = layui.jquery,
        Test = function(){
            this.TestConfig = {
                num:12,
                isLoad:false,
                name:'demo'
            }
        };
    
    Test.prototype.testAdd = function(){
        element.tabAdd(this.TestConfig.name,{
            title:'test1',
            content:'1111111',
            id:1
        });
    }
    Test.prototype.testDelete = function () {
        
    }
    Test.prototype.set = function (option) {
        var _this = this;
        $.extend(true,_this.TestConfig,option);
        return _this;
    }
    
    var test = new Test();
    exports("TestExtend",function (option) {
        return test.set(option);
    });
});