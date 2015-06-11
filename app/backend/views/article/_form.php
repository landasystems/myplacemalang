<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'Article-form',
        'enableAjaxValidation' => false,
        'method' => 'post',
        'type' => 'horizontal',
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data'
        )
    ));
    ?>
    <fieldset>
        <legend>
            <p class="note">Fields dengan <span class="required">*</span> harus di isi.</p>
        </legend>

        <?php echo $form->errorSummary($model, 'Opps!!!', null, array('class' => 'alert alert-error span12')); ?>


        <?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 100)); ?>

        <?php echo $form->dropDownListRow($model, 'article_category_id', CHtml::listData(ArticleCategory::model()->findAll(array('order' => 'root, lft')), 'id', 'nestedname'), array('class' => 'span3', 'empty' => 'root')); ?>
        <?php echo $form->toggleButtonRow($model, 'publish'); ?>

        <?php echo $form->ckEditorRow($model, 'content', array('options' => array('fullpage' => 'js:true', 'filebrowserBrowseUrl' => $this->createUrl("fileManager/indexBlank")))); ?>

        <?php
        echo $form->textAreaRow(
                $model, 'description', array(
            'class' => 'span4',
            'rows' => 5,
            'height' => '200',
                )
        );
        ?>
        <?php
        echo $form->textAreaRow(
                $model, 'keyword', array(
            'class' => 'span4',
            'rows' => 5,
            'height' => '200',
                )
        );
        ?>
        <?php echo $form->fileFieldRow($model, 'primary_image', array('class' => 'span5')); ?>

        <?php if (!isset($_GET['v'])) { ?>
            <div class="form-actions">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'icon' => 'ok white',
                'label' => $model->isNewRecord ? 'Tambah' : 'Simpan',
            ));
            ?>
                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType' => 'reset',
                    'icon' => 'remove',
                    'label' => 'Reset',
                ));
                ?>
            </div>
            <?php } ?>
    </fieldset>

<?php $this->endWidget(); ?>

</div>
