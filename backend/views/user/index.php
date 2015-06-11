<?php
$this->setPageTitle(ucfirst($type));
$this->breadcrumbs = array(
    ucfirst($type),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('User-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<?php
$this->beginWidget('zii.widgets.CPortlet', array(
    'htmlOptions' => array(
        'class' => ''
    )
));
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills',
    'items' => array(
        array('label' => 'Tambah', 'icon' => 'icon-plus', 'url' => Yii::app()->controller->createUrl('create',array('type'=>$type)), 'linkOptions' => array()),
        array('label' => 'Daftar', 'icon' => 'icon-th-list', 'url' => Yii::app()->controller->createUrl($type), 'active' => true, 'linkOptions' => array()),
    ),
));
$this->endWidget();
?>



<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
        'type'=>$type,
    ));
    ?>
</div><!-- search-form -->


<?php
$buton="{view}{update}{delete}";
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'User-grid',
    'dataProvider' => $model->search($type,$roles),
    'type' => 'striped bordered condensed',
    'template' => '{summary}{pager}{items}{pager}',
    'columns' => array(
       array(
           'name' => 'Foto',
            'type' => 'raw',
            'value' => '"$data->tagImg"', 
            'htmlOptions' => array('style' => 'text-align: center; width:100px;text-align:center;')
            ),
        'username',
        'email',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' =>$buton,
            'buttons' => array(
                'view' => array(
                    'label' => 'Lihat',
                    'url'=>'Yii::app()->createUrl("user/view", array("id"=>$data->id,"type"=>"'.$type.'"))',
                    'options' => array(
                        'class' => 'btn btn-small view'
                    )
                ),
                'update' => array(
                    'label' => 'Edit',
                    'url'=>'Yii::app()->createUrl("user/update", array("id"=>$data->id,"type"=>"'.$type.'"))',
                    'options' => array(
                        'class' => 'btn btn-small update'
                    )
                ),
                'delete' => array(
                    'label' => 'Hapus',
                    'options' => array(
                        'class' => 'btn btn-small delete'
                    )
                )
            ),
            'htmlOptions' => array('style' => 'width: 125px'),
        )
    ),
));
?>

