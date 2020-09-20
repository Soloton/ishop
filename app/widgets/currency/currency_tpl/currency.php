<option value="" class="label"><?php echo $this->currency['code']; ?></option>
<?php foreach ($this->currencies as $key => $value) : ?>
    <?php if ($key != $this->currency['code']) : ?>
        <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
    <?php endif; ?>
<?php endforeach; ?>
