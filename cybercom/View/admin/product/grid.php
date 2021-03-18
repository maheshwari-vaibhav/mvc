
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>Products</h3>
            <hr>
            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,null,true); ?>').setMethod('post').load();" class="btn btn-success">Add Product</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12" id="products">
                <table class="table table-striped 'customer'">
                    <thead class="thead-light">
                        <tr>
                            <th>Product Id</th>
                            <th>SKU</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($this->getProducts()->count()): ?>
                            <?php foreach ($this->getProducts()->getData() as $product): ?>
                                <tr>
                                    <td><?=$product->productId;?></td>
                                    <td><?=$product->sku;?></td>
                                    <td><?=$product->name;?></td>
                                    <td><?=$product->price;?></td>
                                    <td><?=$product->discount;?></td>
                                    <td><?=$product->quantity;?></td>
                                    <td><?=$product->description;?></td>
                                    <td><?=$product->createdDate;?></td>
                                    <td><?=$product->status?'Enable':'Disable'?></td>


                                    <td>
                                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id' => $product->productId]); ?>').setMethod('post').setParams($('#productform').serializeArray()).load();" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>

                                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id' => $product->productId]); ?>').setMethod('post').load();" class="btn btn-sm btn-danger delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" align="center">Data not found</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
