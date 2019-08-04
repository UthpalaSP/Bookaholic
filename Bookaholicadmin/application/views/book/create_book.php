<h2>Create Book</h2>

<?php
echo validation_errors("<p class='bg-danger'>");
?>

<?php $attributes = array('id'=>'book_form', 'class'=>'form_horizontal');?>

<form method="post" id="book_form" class="form_horizontal" enctype="multipart/form-data" href="book/create">


    <div class="form-group">

        <?php echo form_label('Book Name*'); ?>

        <?php
        $data = array(
            'class' => 'form-control',
            'name' => 'book_name',
            'placeholder' => 'Enter Book Name'
        );
        ?>
        <?php echo form_input($data);?>

    </div>

    <div class="form-group">

        <?php echo form_label('Book Author*'); ?>

        <?php
        $data = array(
            'class' => 'form-control',
            'name' => 'author',
            'placeholder' => 'Enter Author Name'
        );
        ?>
        <?php echo form_input($data);?>

    </div>

    <div class="form-group">
        <?php echo form_label('Category*'); ?>
        <select class="form-control" name="category_id">
            <option value="">Select</option>
            <?php if (count($categories) > 0): ?>
                <?php foreach ($categories as $category): ?>
                    <?php echo "<option value='$category->id'>" . $category->category_name . "</option>"; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>

    <div class="form-group">

        <?php echo form_label('Image'); ?>
        <input class="form-control" type="file" name="image" id="image" />

    </div>

    <div class="form-group">

        <?php echo form_label('Price*'); ?>

        <?php
        $data = array(
            'class' => 'form-control',
            'name' => 'price',
            'placeholder' => 'Enter Price'
        );
        ?>
        <?php echo form_input($data);?>

    </div>

    <div class="form-group">

        <?php echo form_label('Book Description'); ?>

        <?php
        $data = array(
            'class' => 'form-control',
            'name' => 'book_description',
            'placeholder' => 'Enter Book Description'
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

</form>
