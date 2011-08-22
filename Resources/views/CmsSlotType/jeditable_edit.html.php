<div id="<?php echo $editable['element_id'] ?>" class="elao_cms_slot_editable">
<?php //   {% include "ElaoCmsSlotBundle:CmsSlotType:jeditable_display.html.php" with {'value': editable.element_value} %}
echo $editable['element_value'];
?>
</div>
<script type="text/javascript">
    $('#<?php echo $editable['element_id'] ?>').editable('<?php echo $editable['url'] ?>', {
        submitdata: function(){ return {type: 'jeditable', code: '<?php echo $editable['element_name'] ?>'}; },
        <?php foreach ($editable['options'] as $option => $value) : ?>
            <?php echo $option ?> : "<?php echo $value ?>",
        <?php endforeach; ?>
        indicator:    "Пожалуйста, подождите...",
        submit:       "Сохранить",
        cancel:       "Отменить",
        onblur:       "ignore"
    });
</script>