<div id="<?php echo $editable['element_id'] ?>" class="cms_slot_editable">
<?php //   {% include "ElaoCmsSlotBundle:CmsSlotType:jeditable_display.html.php" with {'value': editable.element_value} %}
    echo nl2br($editable['element_value']);
?>
</div>
<script type="text/javascript">
$(function(){
    $('#<?php echo $editable['element_id'] ?>').bind('edit', function(){
        var container = $('<div>').addClass('modal').appendTo('body');
        $.get('<?php echo $view['router']->generate('elao_cms_slot_edit') ?>', function(data){
            container.append(data);
            
            container.overlay({

                    // some mask tweaks suitable for modal dialogs
                    mask: {
                            color: '#333',
                            loadSpeed: 200,
                            opacity: 0.9
                    },

                    closeOnClick: false,
                    fixed: false,
                    load: true
            });
        });
        //container.load('<?php echo $view['router']->generate('elao_cms_slot_edit') ?>');
    });
});
</script>