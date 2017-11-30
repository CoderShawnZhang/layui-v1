<blockquote class="layui-elem-quote">
    <span class="layui-breadcrumb" lay-separator="<?=$separator;?>">
        <?php
            foreach($content as $key => $val){
                echo ' <a href="'.$val['url'].'">'.$val['text'].'</a>';
            }
        ?>
    </span>
</blockquote>