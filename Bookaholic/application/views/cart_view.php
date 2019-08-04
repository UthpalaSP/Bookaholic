<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-md-9">

            <div class="ibox">
                <div class="ibox-title">
                    <h5>Items in your cart</h5>
                </div>
                <?php echo form_open('order/create_order'); ?>
                <?php foreach ($items as $item): ?>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table shoping-cart-table">

                                <tbody>
                                <tr>
                                    <td class="desc">
                                        <h3>
                                            <a href="<?php echo base_url(); ?>home/display/<?php echo $item['id'] ?>"
                                               class="text-navy">
                                                <?php echo $item['book_name'] ?>
                                            </a>
                                        </h3>
                                        <div class="m-t-sm">
                                            <a href="<?php echo base_url(); ?>cart/remove/<?php echo $item['id'] ?>"
                                               class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
                                        </div>
                                        <div class="m-t-sm">
                                            <a href="" onclick="updateCart(<?php echo $item['id'] ?>)"
                                               class="text-muted"><i class="fa fa-edit"></i> Update item</a>
                                        </div>
                                    </td>

                                    <td>
                                        <?php echo number_format($item['price'], 2) ?>
                                    </td>
                                    <td width="65">
                                        <input type="text" class="form-control" id="qty<?php echo $item['id'] ?>"
                                               name="qty<?php echo $item['id'] ?>"
                                               value="<?php echo $item['quantity'] ?>">
                                    </td>
                                    <td>
                                        <h4>
                                            <?php echo number_format($item['quantity'] * $item['price'], 2) ?>
                                        </h4>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                <?php endforeach; ?>

                <div class="ibox-content">

                    <div class="table-responsive">
                        <button class="btn btn-primary pull-right"><i class="fa fa fa-shopping-cart"></i> Checkout
                        </button>
                    </div>

                </div>
                <?php echo form_close(); ?>
            </div>

        </div>
        <div class="col-md-3">

            <div class="ibox">
                <div class="ibox-title">
                    <h5>Cart Summary</h5>
                </div>
                <div class="ibox-content">
                            <span>
                                Total
                            </span>
                    <h1 class="font-bold">
                        <?php echo number_format($total, 2) ?>
                    </h1>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function updateCart(id) {
        var qty = document.getElementById("qty" + id).value;
        var theUrl = "<?php echo base_url(); ?>cart/update/" + id + "/" + qty
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open("GET", theUrl); // false for synchronous request
        xmlHttp.send(null);
    }
</script>