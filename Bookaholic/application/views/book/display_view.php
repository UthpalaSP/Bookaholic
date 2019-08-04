<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">

            <div class="ibox product-detail">
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-md-5">

                            <slick dots="true">

                                <div>
                                    <div class="image-imitation">
                                        <img src="<?php echo base_url(); ?>assets/images/books/<?php echo $book_data->id ?>.jpg"
                                             width="300px" height="300px">
                                    </div>
                                </div>


                            </slick>

                        </div>
                        <div class="col-md-7">

                            <?php echo form_open('cart/add'); ?>
                            <input type="text" name="id" value="<?php echo $book_data->id ?>" hidden>
                            <h2 class="font-bold m-b-xs">
                                <?php echo $book_data->book_name ?>
                            </h2>
                            <h3>By <?php echo $book_data->author ?></h3>
                            <div class="m-t-md">
                                <h2 class="product-main-price"><?php echo $book_data->price ?>  </h2>
                            </div>
                            <hr>

                            <h4>Book description</h4>

                            <div class="text-muted">
                                <?php echo $book_data->book_description ?>

                            </div>
                            <hr>

                            <div>
                                <div class="btn-group">
                                    <button name="add_cart" type="submit" class="btn btn-primary btn-sm"><i
                                                class="fa fa-cart-plus"></i> Add to cart
                                    </button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>

                        </div>
                    </div>

                    <div class="row">
                        <hr/>
                        <p class="font-bold">
                            Books viewed by other users who viewed this book
                        </p>
                        <hr/>

                        <?php if ($top_books): ?>
                            <?php foreach ($top_books as $book): ?>

                                <div class="col-md-3">
                                    <div>

                                        <a href="<?php echo base_url(); ?>home/display/<?php echo $book->book_id ?>"
                                           class="product-name"> <?php echo $book->book_name ?></a>
                                        <div class="medium m-t-xs">
                                            <?php echo $book->author ?>
                                        </div>
                                        <div class="small m-t-xs">
                                            <?php echo number_format($book->price, 2) ?>
                                        </div>
                                        <div class="m-t text-left">
                                            <a href="<?php echo base_url(); ?>home/display/<?php echo $book->book_id ?>"
                                               class="btn btn-xs btn-outline btn-primary">Info <i
                                                        class="fa fa-long-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                    <hr/>
                                </div>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
