
<?php
//展示小部件
?>
<?= eval( "?>" . "<?php echo \\app\\YiiFramework2\\Widgets\\{$widgetName}\\{$widgetName}::widget({$widgetParams}); ?>" ); ?>