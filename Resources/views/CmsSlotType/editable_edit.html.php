<div id="<?php echo $editable['element_id'] ?>" class="cms_slot_editable">
<?php //   {% include "ElaoCmsSlotBundle:CmsSlotType:jeditable_display.html.php" with {'value': editable.element_value} %}
    echo nl2br($editable['element_value']);
?>
</div>
<div class="modal" id="<?php echo $editable['element_id'] ?>-overlay">
    <form action="<?php echo $view['router']->generate($editable['url']) ?>" class="b-form b-big-form">
        
            <h2 class="b-form__title">Редактирование</h2>

            <div class="b-form-box">
                
                    <div class="b-form-line">
                            <dl class="b-form-line__in">
                                    <dt class="b-form-line__label"><label for="title"><strong class="b-form-require">Заголовок: <i class="b-ico">*</i></strong></label></dt>
                                    <dd class="b-form-line__content">
                                            <textarea></textarea>
                                            <input type="text" name="title" id="title" value="" />
                                            <p class="b-form-note">&nbsp;</p>

                                    </dd>
                            </dl><!-- /b-form-line__in -->
                    </div><!-- /b-form-line -->
                
           </div> 

            <div class="b-form-buttons">
                    <span class="b-button">
                            <span class="b-button__in">
                                    <input type="submit" value="Сохранить" class="b-button-text" />
                            </span>
                    </span>
            </div>

    </form><!-- /b-form -->
</div>