
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>Payments</h3>
            <hr>
            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,null,true) ?>').setMethod('post').load();" class="btn btn-success">Add Payment</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12" id="payments">
            <table class="table table-striped 'customer'">
                <thead class="thead-light">
                    <tr>
                        <th>Method Id</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Created Date</th>

                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($this->getPayments()->count()): ?>
                        <?php foreach ($this->getPayments()->getData() as $payment): ?>
                            <tr>
                                <tr>
                                    <td><?=$payment->methodId;?></td>
                                    <td><?=$payment->name;?></td>
                                    <td><?=$payment->code;?></td>
                                    <td><?=$payment->description;?></td>
                                    <td><?=$payment->createdDate;?></td>
                                    <td><?=$payment->status?'Enable':'Disable'?></td>

                                    <td>
                                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id' => $payment->methodId]); ?>').setMethod('post').load();"  class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>

                                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id' => $payment->methodId]); ?>').setMethod('post').load();" class="btn btn-sm btn-danger delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" align="center">Data not found</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
