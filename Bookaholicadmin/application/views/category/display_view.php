<div class="col-xs-9">
    <h1>Category Name: <?php echo $category_data->category_name; ?></h1>
    <p>Date Created: <?php echo $category_data->created_date; ?></p>
    <h3>Description</h3>
    <p><?php echo $category_data->category_description; ?></p>
</div>


<div class="col-xs-3 pull-right">
    <ul class="list-group">
        <h5>Actions</h5>

        <li class="list-group-item"><a href="">Create Book</a></li> <?php /*echo base_url(); */?><!--/book/create/--><?php /*echo $category->id; */?>
        <li class="list-group-item"><a href="<?php echo base_url(); ?>category/edit/<?php echo $category_data->id; ?>">Edit Category</a></li>
        <li class="list-group-item"><a href="<?php echo base_url(); ?>category/delete/<?php echo $category_data->id; ?>">Delete Category</a></li>
    </ul>
</div>