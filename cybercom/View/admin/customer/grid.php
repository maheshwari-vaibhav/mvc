
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>Customer</h3>
            <hr>
            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,null,true) ?>').setMethod('post').load();" class="btn btn-success">Add Customer</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12" id="customers">
            <table class="table table-striped 'customer'">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Group Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Zipcode</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($this->getCustomers()->count()): ?>
                        <?php foreach ($this->getCustomers()->getData() as $customer): ?>
                            <tr>
                                <tr>
                                    <td><?=$customer->customerId;?></td>
                                    <td><?=$customer->groupname;?></td>
                                    <td><?=$customer->firstName;?></td>
                                    <td><?=$customer->lastName;?></td>
                                    <td><?=$customer->email;?></td>
                                    <td><?=$customer->mobile;?></td>
                                    <td><?=$customer->zipcode;?></td>
                                    <td><?=$customer->createdDate;?></td>
                                    <td><?=$customer->status?'Enable':'Disable'?></td>
                                    <td>
                                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id' => $customer->customerId]); ?>').setMethod('post').load();"  class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>

                                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id' => $customer->customerId]); ?>').setMethod('post').load();" class="btn btn-sm btn-danger delete"><i class="fas fa-trash-alt"></i></a>
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
