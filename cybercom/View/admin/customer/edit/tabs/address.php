<?php 

$biling =  $this->getBiling(); 
$shipping =  $this->getShipping();
?>
<h4>Biling Address</h4>
<div class="form-group">
    <label for="address">Address:</label>
    <textarea class="form-control" name="biling[address]" id="address">
        <?=$biling->address;?>
    </textarea>
</div>      
<div class="form-group">
    <label for="city">City:</label>
    <input type="text" class="form-control" placeholder="Enter city" id="city" name="biling[city]" value="<?=$biling->city?>">
</div>
<div class="form-group">
    <label for="state">State:</label>
    <input type="text" class="form-control" placeholder="Enter state" id="state" name="biling[state]" value="<?=$biling->state?>">
</div>
<div class="form-group">
    <label for="zipcode">Zipcode:</label>
    <input type="text" class="form-control" placeholder="Enter zipcode" id="zipcode" name="biling[zipcode]" value="<?=$biling->zipcode?>">
</div>
<div class="form-group">
    <label for="country">Country:</label>
    <input type="text" class="form-control" placeholder="Enter country" id="country" name="biling[country]" value="<?=$biling->country?>">
</div>

<h4>Shipping Address</h4>
<div class="form-group">
    <label for="address">Address:</label>
    <textarea class="form-control" name="shipping[address]" id="address">
        <?=$shipping->address;?>
    </textarea>
</div>      
<div class="form-group">
    <label for="city">City:</label>
    <input type="text" class="form-control" placeholder="Enter city" id="city" name="shipping[city]" value="<?=$shipping->city?>">
</div>
<div class="form-group">
    <label for="state">State:</label>
    <input type="text" class="form-control" placeholder="Enter state" id="state" name="shipping[state]" value="<?=$shipping->state?>">
</div>
<div class="form-group">
    <label for="zipcode">Zipcode:</label>
    <input type="text" class="form-control" placeholder="Enter zipcode" id="zipcode" name="shipping[zipcode]" value="<?=$shipping->zipcode?>">
</div>
<div class="form-group">
    <label for="country">Country:</label>
    <input type="text" class="form-control" placeholder="Enter country" id="country" name="shipping[country]" value="<?=$shipping->country?>">
</div>

<button type="button" class="btn btn-primary" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save'); ?>').setMethod('post').resetParms().setParams($('#editform').serializeArray()).load();">
    <?= $this->getTableRow()->customerId ? 'Update' : 'Save';?>
</button>  