<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>Customer Group</h3>
            <hr>
            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,null,true) ?>').setMethod('post').load();" class="btn btn-success">Add Customer Group</a>
        </div>
    </div>
    <div class="row mt-3">

        <div class="col-12" id="customers">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($this->getCustomergroup()->count()): ?>
                        <?php foreach ($this->getCustomergroup()->getData() as $customergroup): ?>
                            <tr>
                                <tr>
                                    <td><?=$customergroup->groupId;?></td>
                                    <td><?=$customergroup->name;?></td>
                                    <td><?=$customergroup->status?'Enable':'Disable'?></td>
                                    <td><?=$customergroup->createdDate;?></td>
                                    <td>
                                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id' => $customergroup->groupId]); ?>').setMethod('post').load();"  class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>

                                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id' => $customergroup->groupId]); ?>').setMethod('post').load();" class="btn btn-sm btn-danger delete"><i class="fas fa-trash-alt"></i></a></a>
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
