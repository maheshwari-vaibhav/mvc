
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>Category</h3>
            <hr>
            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,null,true) ?>').setMethod('post').load();" class="btn btn-success">Add Category</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12" id="category">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Category Id</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($this->getDisplayName()): ?>
                        <?php foreach ($this->getDisplayName() as $category): ?>
                            <tr>
                                <tr>
                                    <td><?=$category->categoryId;?></td>
                                    <td><?=$category->name;?></td>
                                    <td><?=$category->description;?></td>
                                    <td><?= $category->status ?'Enable':'Disable'?></td>

                                    <td>
                                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id' => $category->categoryId]); ?>').setMethod('post').load();"  class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>

                                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id' => $category->categoryId]); ?>').setMethod('post').load();" class="btn btn-sm btn-danger delete"><i class="fas fa-trash-alt"></i></a>
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