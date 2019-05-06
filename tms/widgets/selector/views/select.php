<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="form-group required">
    <label class="control-label"><?= $label; ?></label>
    <div class="rule-photo-list" id="<?= $boxId; ?>">
        <div class="img-box" data-toggle="modal" data-target="#ajaxModalMax" href="<?= Url::to(['/selector/list', 'boxId' => $boxId, 'media_type' => $type])?>">
            <?php if ($type == 'news' || $type == 'image'){ ?>
                <?= Html::img(!empty($model->media_url) ? Url::to(['analysis/image','attach' => $model->media_url]) : '@web/resources/dist/img/add-img.png')?>
            <?php }else{ ?>
                <i class="fa fa-file" style="font-size: 35px;margin:0 auto;padding-top: 40px"></i>
            <?php } ?>
            <div class="bottomBar"><?= !empty($model->file_name) ? $model->file_name : '点击选择'?></div>
        </div>
        <div class="hint-block"><?= $block ?></div>
        <?= Html::hiddenInput($name, $value)?>
    </div>
</div>