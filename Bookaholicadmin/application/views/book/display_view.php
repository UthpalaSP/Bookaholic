<div class="col-xs-9">
    <h1><?php echo $book_data->book_name; ?> By <?php echo $book_data->author; ?></h1>
    <p>Added on: <?php echo $book_data->created_date; ?></p>
    <p><?php echo $book_data->book_description; ?></p>
    <hr/>
    <div>
        <h2>Visitor Statistics</h2>
        <p>No of visits for this book: <?php echo $book_views->views ?></p>
        <hr/>
        <p>Users who viewed this book also viewed</p>
        <?php foreach ($top_books as $book): ?>

            <div class="col-md-3">
                <div>

                    <a href="<?php echo base_url(); ?>book/display/<?php echo $book->book_id ?>"
                       class="product-name"> <?php echo $book->book_name ?></a>
                    <div class="medium m-t-xs">
                        <?php echo $book->author ?>
                    </div>
                    <div class="small m-t-xs">
                        <?php echo number_format($book->price, 2) ?>
                    </div>
                    <div class="m-t text-left">
                        <a href="<?php echo base_url(); ?>book/display/<?php echo $book->book_id ?>"
                           class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>
                <hr/>
            </div>

        <?php endforeach; ?>
    </div>
</div>
