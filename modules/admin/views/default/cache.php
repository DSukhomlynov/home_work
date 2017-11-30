<?php
    /**
     * Created by PhpStorm.
     * User: moohii07
     * Date: 01.11.2017
     * Time: 14:17
     */
?>
<h3>Работа с кэшем</h3>
<p>Выберите что именно хотите закэшировать</p>
<form method="post">
    <?=\yii\helpers\Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii::$app->getRequest()->getCsrfToken(), [])?>
    <input class="clear-cache" type="button" name="settings" value="Настройки">
</form>

<script>
    $(document).ready(function (e) {
        $('.clear-cache').click(function (e) {
            var params = new Object();
            params.type = $(this).attr('name');
            params._csrf = $('input[name="_csrf"]').val();
            console.log(params);
            $.ajax({
               type: "POST",
               data: params,
               success: function(msg){
                   alert(msg);
               }
            });
        });
    });
</script>
