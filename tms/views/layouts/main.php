<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use backend\assets\AppAsset;
use backend\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language; ?>">
    <head>
        <meta charset="<?= Yii::$app->charset; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"<
        <meta name="renderer" content="webkit">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title); ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition sidebar-mini fixed">
    <?php $this->beginBody() ?>
    <div class="wrapper-content">
        <section class="content-header">
            <a href="<?= Yii::$app->request->getUrl(); ?>" class="rfHeaderFont">
                <i class="glyphicon glyphicon-refresh"></i> 刷新
            </a>
            <?php if (Yii::$app->request->referrer != Yii::$app->request->hostInfo . Yii::$app->request->getBaseUrl() . '/'){ ?>
                <a href="javascript:history.go(-1)" class="rfHeaderFont">
                    <i class="fa fa-mail-reply"></i> 返回
                </a>
            <?php } ?>
            <?= Breadcrumbs::widget([
                'tag' => 'ol',
                'homeLink'=>[
                    'label' => '<i class="fa fa-dashboard"></i>' . Yii::$app->params['adminAcronym'],
                    'url' => "",
                ],
                'encodeLabels' => false,
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </section>
        <section class="content">
            <?= $content; ?>
        </section>
        <?= Alert::widget(); ?>
    </div>
    <?php $this->endBody() ?>
    <!--ajax模拟框加载-->
    <div class="modal fade" id="ajaxModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <?= Html::img('@web/resources/dist/img/loading.gif', ['class' => 'loading'])?>
                    <span>加载中... </span>
                </div>
            </div>
        </div>
    </div>
    <!--ajax大模拟框加载-->
    <div class="modal fade" id="ajaxModalLg" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <?= Html::img('@web/resources/dist/img/loading.gif', ['class' => 'loading'])?>
                    <span>加载中... </span>
                </div>
            </div>
        </div>
    </div>
    <!--ajax最大模拟框加载-->
    <div class="modal fade" id="ajaxModalMax" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 70%">
            <div class="modal-content">
                <div class="modal-body">
                    <?= Html::img('@web/resources/dist/img/loading.gif', ['class' => 'loading'])?>
                    <span>加载中... </span>
                </div>
            </div>
        </div>
    </div>
    <!--初始化模拟框-->
    <div id="rfModalBody" class="hide">
        <div class="modal-body">
            <?= Html::img('@web/resources/dist/img/loading.gif', ['class' => 'loading'])?>
            <span>加载中... </span>
        </div>
    </div>

    <script>
        // 小模拟框清除
        $('#ajaxModal').on('hide.bs.modal', function () {
            $(this).removeData("bs.modal");
            $('#ajaxModal').find('.modal-content').html($('#rfModalBody').html());
        });
        // 大模拟框清除
        $('#ajaxModalLg').on('hide.bs.modal', function () {
            $(this).removeData("bs.modal");
            $('#ajaxModalLg').find('.modal-content').html($('#rfModalBody').html());
        });
        // 最大模拟框清除
        $('#ajaxModalMax').on('hide.bs.modal', function () {
            $(this).removeData("bs.modal");
            $('#ajaxModalMax').find('.modal-content').html($('#rfModalBody').html());
        });

        // 配置
        var config = {
            tag: <?= Yii::$app->debris->config('sys_tags'); ?>,
            isMobile: "<?= Yii::$app->params['isMobile']; ?>",
        };

        // 启用状态 status 1:启用;0禁用;
        function rfStatus(obj){
            var id = $(obj).parent().parent().attr('id');
            var status = 0; self = $(obj);
            if (self.hasClass("btn-success")){
                status = 1;
            }

            if (!id) {
                id = $(obj).parent().parent().attr('data-key');
            }

            $.ajax({
                type : "get",
                url : "<?= Url::to(['ajax-update'])?>",
                dataType :  "json",
                data : {
                    id : id,
                    status : status
                },
                success : function(data){
                    if (data.code == 200) {
                        if(self.hasClass("btn-success")){
                            self.removeClass("btn-success").addClass("btn-default");
                            self.text('禁用');
                        } else {
                            self.removeClass("btn-default").addClass("btn-success");
                            self.text('启用');
                        }
                    } else {
                        rfAffirm(data.message);
                    }
                }
            });
        }

        // 排序
        function rfSort(obj){
            var id = $(obj).parent().parent().attr('id');
            if (!id) {
                id = $(obj).parent().parent().attr('data-key');
            }

            var sort = $(obj).val();
            if (isNaN(sort)) {
                rfAffirm('排序只能为数字');
                return false;
            } else {
                $.ajax({
                    type : "get",
                    url : "<?= Url::to(['ajax-update'])?>",
                    dataType : "json",
                    data : {
                        id : id,
                        sort : sort
                    },
                    success : function(data) {
                        if (data.code != 200) {
                            rfAffirm(data.message);
                        }
                    }
                });
            }
        }
    </script>
    </body>
    </html>
<?php $this->endPage() ?>