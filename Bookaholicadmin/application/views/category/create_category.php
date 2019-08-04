<h2>Create Category</h2>

<?php $attributes = array('id'=>'category_form', 'class'=>'form_horizontal');?>

<?php
echo validation_errors("<p class='bg-danger'>");
?>

<?php echo form_open('category/create',$attributes);?>

<div class="form-group">

    <?php echo form_label('Category Name*'); ?>

    <?php
    $data = array(
        'class' => 'form-control',
        'name' => 'category_name',
        'placeholder' => 'Enter Category Name'
    );
    ?>
    <?php echo form_input($data);?>

</div>

<div class="form-group">

    <?php echo form_label('Category Description'); ?>

    <?php
    $data = array(
        'class' => 'form-control',
        'name' => 'category_description',
        'placeholder' => 'Enter Category Description'
    );
    ?>
    <?php echo form_textarea($data);?>

</div>

<div class="form-group">

    <?php
    $data = array(
        'class' => 'btn btn-primary',
        'name' => 'submit',
        'value' => 'Create'
    );
    ?>
    <?php echo form_submit($data);?>

</div>

<?php echo form_close();?>