<div id="news-<?php echo $news->getI ?>" class="cms_slot_editable">
<?php //   {% include "ElaoCmsSlotBundle:CmsSlotType:jeditable_display.html.php" with {'value': editable.element_value} %}
    //echo $editable['element_value'];
var_dump($news, $optinos);
?>
<?php $view->include('ElaoCmsSlotBundle:CmsSlotType:news_display.html.php', array('news' => $news, 'options' => $options)) ?>
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

<div id="overlay-edit" class="modal">

    <form action="<?php echo $view['router']->generate('page_meta_save') ?>" method="post" class="b-form">
            <input type="hidden" name="url" value="<?php echo $page->getUrl() ?>" />
            <h2 class="b-form__title">Настройки страницы</h2>

            <div class="b-form-box">
                
                    <div class="b-form-line">
                            <dl class="b-form-line__in">
                                    <dt class="b-form-line__label"><label for="title"><strong class="b-form-require">Заголовок: <i class="b-ico">*</i></strong></label></dt>
                                    <dd class="b-form-line__content">
                                            <input type="text" name="title" id="title" value="<?php echo $page->getTitle() ?>" />
                                            <p class="b-form-note">Заголовок страницы</p>

                                    </dd>
                            </dl><!-- /b-form-line__in -->
                    </div><!-- /b-form-line -->
                
                    <div class="b-form-line">
                            <dl class="b-form-line__in">
                                    <dt class="b-form-line__label"><label for="metaTitle">Meta title:</label></dt>
                                    <dd class="b-form-line__content">
                                            <input type="text" name="metaTitle" id="metaTitle" value="<?php echo $page->getMetaTitle() ?>" />
                                            <p class="b-form-note">Желаемый заголовок в выдаче поисковика</p>
                                    </dd>

                            </dl><!-- /b-form-line__in -->
                    </div><!-- /b-form-line -->
                    
                    <div class="b-form-line">
                            <dl class="b-form-line__in">
                                    <dt class="b-form-line__label"><label for="metaDescription">Meta description:</label></dt>
                                    <dd class="b-form-line__content">
                                            <input type="text" name="metaDescription" id="metaDescription" value="<?php echo $page->getMetaDescription() ?>" />
                                            <p class="b-form-note">Описание содержимого страницы</p>
                                    </dd>

                            </dl><!-- /b-form-line__in -->
                    </div><!-- /b-form-line -->
                    
                    <div class="b-form-line">
                            <dl class="b-form-line__in">
                                    <dt class="b-form-line__label"><label for="metaKeywords">Meta keywords:</label></dt>
                                    <dd class="b-form-line__content">
                                            <input type="text" name="metaKeywords" id="metaKeywords" value="<?php echo $page->getMetaKeywords() ?>" />
                                            <p class="b-form-note">Ключевые слова html страницы</p>
                                    </dd>

                            </dl><!-- /b-form-line__in -->
                    </div><!-- /b-form-line -->

            </div><!-- /b-form-box -->

            <div class="b-form-buttons">
                    <span class="b-button">
                            <span class="b-button__in">
                                    <input type="submit" value="Сохранить" class="b-button-text" />
                            </span>
                    </span>
            </div>

    </form><!-- /b-form -->

</div>