
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>Admin</h3>
            <hr>
            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,null,true) ?>').setMethod('post').load();" class="btn btn-success">Add Admin</a>
        </div>
    </div>
    <div class="row mt-3">

        <div class="col-12" id="customers">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($this->getAdmins()->count()): ?>
                        <?php foreach ($this->getAdmins()->getData() as $admin): ?>
                            <tr>
                                <tr>
                                    <td><?=$admin->adminId;?></td>
                                    <td><?=$admin->username;?></td>
                                    <td><?=$admin->createdDate;?></td>
                                    <td><?=$admin->status?'Enable':'Disable'?></td>
                                    <td>
                                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id' => $admin->adminId]); ?>').setMethod('post').load();"  class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>

                                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id' => $admin->adminId]); ?>').setMethod('post').load();" class="btn btn-sm btn-danger delete"><i class="fas fa-trash-alt"></i></a>
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
