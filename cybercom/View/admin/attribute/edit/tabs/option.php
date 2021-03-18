<?php $attributeOptions = $this->getTableRow()->getOptions(); ?>
<div class="container">
    <input type="button" name="addoption" value="Save" class="btn btn-info" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save','admin_attribute_option'); ?>').setMethod('post').resetParms().setParams($('#editform').serializeArray()).load();">

    <table id="myTable" class="table table-striped option-list mt-3" width="100%">
        <thead>
            <tr>
                <td>Option Name</td>
                <td>Sort order</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attributeOptions->getData() as $attributeOption): ?>
                <tr>
                    <td>
                        <input type="text" name="exist[<?= $attributeOption->optionId ?>][name]" class="form-control" value="<?= $attributeOption->name;?>" />
                    </td>
                    <td>
                        <input type="text" name="exist[<?= $attributeOption->optionId ?>][sortOrder]"  class="form-control" value="<?= $attributeOption->sortOrder;?>" />
                    </td>
                    <td>
                        <input type="button" class="ibtnDel btn btn-md btn-danger delete" id="<?= $attributeOption->optionId ?>"  value="Delete" url="<?php echo $this->getUrl()->getUrl('delete','admin_attribute_option',['optionid' => $attributeOption->optionId]); ?>">
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align: left;">
                    <button type="button" class="btn btn-primary" id="addrow">
                        Add Option
                    </button>
                </td>
            </tr>
            <tr>
            </tr>
        </tfoot>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var counter = 0;

        $("#addrow").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><input type="text" class="form-control" name="new[name][]"/></td>';
            cols += '<td><input type="text" class="form-control" name="new[sortOrder][]"/></td>';

            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("table.option-list").prepend(newRow);
            counter++;
        });

        $("table.option-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();       
            counter -= 1
        });

        $("table.option-list").on("click", ".delete", function (event) {
           let url = $(this).attr('url');
           object.setUrl(url).setMethod('post').load();
        });

	});
</script>