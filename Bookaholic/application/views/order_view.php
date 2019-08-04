<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    Order ID <?php echo $items->order_id ?>
                    Customer
                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                        <thead>
                        <tr>

                            <th data-hide="phone">Book</th>
                            <th data-hide="phone">Quantity</th>
                            <th data-hide="phone">Unit Price</th>
                            <th class="text-right">Total</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                Customer example<?php echo $items->book_name ?>
                            </td>
                            <td>
                                3<?php echo $items->quantity ?>
                            </td>
                            <td>
                                $500.00<?php echo $items->price ?>
                            </td>
                            <td class="text-right">
                                $1500.00<?php echo $items->quantity*$items->price ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>