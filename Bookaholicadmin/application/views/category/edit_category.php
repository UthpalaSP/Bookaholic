<h2>Edit Category</h2>

<?php $attributes = array('id'=>'category_form', 'class'=>'form_horizontal');?>

<?php
if($this->session->flashdata('errors')):
    echo $this->session->flashdata('errors');
endif;
?>

<?php echo form_open('category/edit/'. $category_data->id .'',$attributes);?>

<div class="form-group">

    <?php echo form_label('Category Name'); ?>

    <?php
    $data = array(
        'class' => 'form-control',
        'name' => 'category_name',
        'value' => $category_data->category_name
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
        'value' => $category_data->category_description
    );
    ?>
    <?php echo form_textarea($data);?>

</div>

<div class="form-group">

    <?php
    $data = array(
        'class' => 'btn btn-primary',
        'name' => 'submit',
        'value' => 'Update'
    );
    ?>
    <?php echo form_submit($data);?>

</div>




<?php echo form_close();?>