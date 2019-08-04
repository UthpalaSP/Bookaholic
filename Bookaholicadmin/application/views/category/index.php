<h1>Categories</h1>

<p class="bg-success">
    <?php if ($this->session->flashdata('category_created')):
        echo $this->session->flashdata('category_created');
    endif;
    ?>
    <?php if ($this->session->flashdata('category_updated')):
        echo $this->session->flashdata('category_updated');
    endif;
    ?>
    <?php if ($this->session->flashdata('category_deleted')):
        echo $this->session->flashdata('category_deleted');
    endif;
    ?>
</p>

<a class="btn btn-primary pull-right" href="<?php echo base_url(); ?>category/create">Create Category</a>

<table class="table table-hover">

    <thead>
    <th>Category Name</th>
    <th>Category Description</th>
    </thead>
    <tbody>
    </tbody>

    <?php foreach ($categories as $category): ?>

        <tr><?php echo "<td><a href='". base_url() ."category/display/". $category->id ."'>" . $category->category_name . "</a></td>"; ?>
            <?php echo "<td>" . $category->category_description . "</td>"; ?>
            <td>
                <a href="<?php echo base_url(); ?>category/delete/<?php echo $category->id ?>">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            </td>
        </tr>

    <?php endforeach;?>

    </tbody>
</table>