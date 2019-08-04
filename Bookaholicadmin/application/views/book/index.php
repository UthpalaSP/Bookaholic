<h1>Books</h1>

<p class="bg-success">
    <?php if ($this->session->flashdata('book_created')):
        echo $this->session->flashdata('book_created');
    endif;
    ?>
    <?php if ($this->session->flashdata('book_deleted')):
        echo $this->session->flashdata('book_deleted');
    endif;
    ?>
</p>

<p class="bg-danger">

    <?php if ($this->session->flashdata('book_image_failed')):
        echo $this->session->flashdata('book_image_failed');
    endif;
    ?>
</p>

<div class="row">
    <form action="<?php echo base_url(); ?>book/search/" method="POST">
        <div class="col-md-6"><input type="text" name="search_text" class="form-control" value="<?php echo $text ?>"
                                     placeholder="Search book or author"></div>
        <div class="col-md-3">
            <button class="btn btn-default" type="submit">Search</button>
        </div>
    </form>
    <div class="col-md-3"><a class="btn btn-primary" href="<?php echo base_url(); ?>book/create">Create Book</a></div>
</div>

<table class="table table-hover">

    <thead>
    <th>Book Name</th>
    <th>Book Description</th>
    <th>Author</th>
    <th>Category</th>
    </thead>
    <tbody>
    </tbody>

    <?php foreach ($books as $book): ?>

        <tr><?php echo "<td><a href='" . base_url() . "book/display/" . $book->id . "'>" . $book->book_name . "</a></td>"; ?>
            <?php echo "<td>" . $book->book_description . "</td>"; ?>
            <?php echo "<td>" . $book->author . "</td>"; ?>
            <?php echo "<td>" . $book->category_name . "</td>"; ?>

            <td>
                <a href="<?php echo base_url(); ?>book/delete/<?php echo $book->id ?>">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            </td>
        </tr>

    <?php endforeach; ?>

    </tbody>
</table>