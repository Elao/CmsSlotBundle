<div id="news-<?php echo $news->getId() ?>" class="cms_slot_editable">
    <?php echo $view->render('ElaoCmsSlotBundle:CmsSlotType:news_display.html.php', array('news' => $news, 'options' => $options)) ?>
</div>
<div class="modal" id="news-<?php echo $news->getId() ?>-overlay">
    <form action="<?php echo $view['router']->generate('elao_cms_slot_save') ?>" class="b-form b-big-form editable-form">
            <input type="hidden" name="type" value="news" />
            <input type="hidden" name="code" value="news-<?php echo $news->getId() ?>" />
            <h2 class="b-form__title">Редактирование новости</h2>

            <div class="b-form-box">
                
                    <div class="b-form-line">
                            <dl class="b-form-line__in">
                                    <dt class="b-form-line__label"><label for="title"><strong class="b-form-require">Заголовок: <i class="b-ico">*</i></strong></label></dt>
                                    <dd class="b-form-line__content">
                                            <input type="text" name="title" value="<?php echo $news->getTitle() ?>" />
                                            <p class="b-form-note">Заголовок новости</p>

                                    </dd>
                            </dl><!-- /b-form-line__in -->
                            
                            <dl class="b-form-line__in">
                                    <dt class="b-form-line__label"><label for="announce"><strong class="b-form-require">Анонс: <i class="b-ico">*</i></strong></label></dt>
                                    <dd class="b-form-line__content">
                                            <textarea rows="0" style="border: medium none; padding: 0pt; height: 0pt;"></textarea>
                                            <textarea id="news-<?php echo $news->getId() ?>-announce" class="ckeditor" name="announce"><?php echo $news->getAnnounce() ?></textarea>
                                            <p class="b-form-note">Анонс новости</p>

                                    </dd>
                            </dl><!-- /b-form-line__in -->
                            
                            <dl class="b-form-line__in">
                                    <dt class="b-form-line__label"><label for="detail"><strong class="b-form-require">Текст новости: <i class="b-ico">*</i></strong></label></dt>
                                    <dd class="b-form-line__content">
                                            <textarea rows="0" style="border: medium none; padding: 0pt; height: 0pt;"></textarea>
                                            <textarea id="news-<?php echo $news->getId() ?>-detail" class="ckeditor" name="detail"><?php echo $news->getDetail() ?></textarea>
                                            <p class="b-form-note">Подробный текст новости</p>

                                    </dd>
                            </dl><!-- /b-form-line__in -->                            
                            
                            <dl class="b-form-line__in">
                                    <dt class="b-form-line__label"><label for="publishDate"><strong class="b-form-require">Дата публикации: <i class="b-ico">*</i></strong></label></dt>
                                    <dd class="b-form-line__content">
                                            <input type="text" name="publishDate" value="<?php echo $news->getPublishDate() ? $news->getPublishDate()->format('d.m.Y H:i') : '' ?>" />
                                            <p class="b-form-note">Дата в формате: дд.мм.гггг чч:мм</p>

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
<script type="text/javascript">
$(function(){
    $('#news-<?php echo $news->getId() ?>-overlay').detach().appendTo('body');        
});
</script>