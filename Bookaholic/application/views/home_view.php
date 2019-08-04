<p class="bg-success">
    <?php if ($this->session->flashdata('login_success')):
        echo $this->session->flashdata('login_success');
    endif;
    ?>

    <?php
    if ($this->session->flashdata('user_registered')):
        echo $this->session->flashdata('user_registered');
    endif;
    ?>

</p>
<p class="bg-danger">
    <?php if ($this->session->flashdata('login_failed')):
        echo $this->session->flashdata('login_failed');
    endif;
    ?>

    <?php
    if ($this->session->flashdata('no_access')):
        echo $this->session->flashdata('no_access');
    endif;
    ?>

</p>

<h1>Are you a Bookaholic?</h1>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        <?php foreach ($books as $book): ?>

            <div class="product-box">
                <div class="product-imitation">
                    <img src="<?php echo base_url(); ?>assets/images/books/<?php echo $book->id ?>.jpg" width="140px"
                         height="150px">

                </div>
                <div class="product-desc">
                                <span class="product-price">
                                    <?php echo number_format($book->price, 2) ?>
                                </span>
                    <a href="<?php echo base_url(); ?>home/display/<?php echo $book->id ?>"
                       class="product-name"><?php echo $book->book_name ?></a>

                    <div class="small m-t-xs">
                        <?php echo $book->author ?>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>


    </div>
    <div class="row">
        <div class="pull-right" id="pagination">
            <ul class="pagination float-right tsc_pagination">
                <!-- Show pagination links -->
                <?php foreach ($links as $link) {
                    echo "<li>" . $link . "</li>";
                } ?>
            </ul>
        </div>
    </div>
</div>