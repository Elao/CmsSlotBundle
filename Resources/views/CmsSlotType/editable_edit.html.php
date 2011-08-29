<div id="<?php echo $editable['element_id'] ?>" class="cms_slot_editable">
<?php //   {% include "ElaoCmsSlotBundle:CmsSlotType:jeditable_display.html.php" with {'value': editable.element_value} %}
    echo $editable['element_value'];
?>
</div>
<div class="modal" id="<?php echo $editable['element_id'] ?>-overlay">
    <form action="<?php echo $view['router']->generate($editable['url']) ?>" class="b-form b-big-form editable-form">
            <input type="hidden" name="type" value="editable" />
            <input type="hidden" name="code" value="<?php echo $editable['element_name'] ?>" />
            <h2 class="b-form__title">Редактирование</h2>

            <div class="b-form-box">
                
                    <div class="b-form-line">
                            <dl class="b-form-line__in">
                                    <dt class="b-form-line__label"><label for="title"><strong class="b-form-require">Текст: <i class="b-ico">*</i></strong></label></dt>
                                    <dd class="b-form-line__content">
                                            <?php if ($editable['options']['type'] == 'ckeditor') : ?><textarea rows="0" style="border: medium none; padding: 0pt; height: 0pt;"></textarea><?php endif; ?>
                                            <textarea id="editableValue" rows="10" name="value"<?php if ($editable['options']['type'] == 'ckeditor') : ?> class="ckeditor"<?php endif; ?>><?php echo $editable['element_value']; ?></textarea>
                                            <p class="b-form-note">Жмите кнопку сохранить и ждите ответного гудка</p>

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