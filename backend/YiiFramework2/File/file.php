<?php

namespace backend\YiiFramework2\File;
/**
 * 文件操作类
 */
class file
{
    /**
     *
     * 从后往前截取指定标记后的字符串
     *
     * @param $str 要截取的字符串
     * @param $mark 截取标志
     *
     * @return string 返回截取后的字符串
     */
    public function substrByMark($str,$mark){
        return substr($str,strrpos($str,$mark)+1);
    }

    /**
     *
     * 递归循环获取指定目录下的所有文件夹与文件层级
     *
     * @param $arr_file  保存文件目录数据
     * @param $directory    文件目录
     * @param string $dir_name
     */
    public function tree(&$arr_file, $directory, $dir_name='')
    {

        $mydir = dir($directory);
        while($file = $mydir->read())
        {
            if((is_dir("$directory/$file")) AND ($file != ".") AND ($file != ".."))
            {
                $this->tree($arr_file, "$directory/$file", "$dir_name/$file");
            }
            else if(($file != ".") AND ($file != ".."))
            {
                $arr_file[] = "$dir_name/$file";
            }
        }
        $mydir->close();
    }
}