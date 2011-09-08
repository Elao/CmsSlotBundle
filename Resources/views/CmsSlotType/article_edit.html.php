<div id="article-<?php echo $article->getId() ?>" class="cms_slot_editable">
    <?php echo $view->render('ElaoCmsSlotBundle:CmsSlotType:article_display.html.php', array('article' => $article, 'options' => $options)) ?>
</div>
<div class="modal" id="article-<?php echo $article->getId() ?>-overlay">
    <form action="<?php echo $view['router']->generate('elao_cms_slot_save') ?>" class="b-form b-big-form editable-form">
            <input type="hidden" name="type" value="article" />
            <input type="hidden" name="code" value="article-<?php echo $article->getId() ?>" />
            <div class="b-form-box">
                
                    <div class="b-form-line">
                            <dl class="b-form-line__in">
                                    <dt class="b-form-line__label"><label for="title"><strong class="b-form-require">Заголовок: <i class="b-ico">*</i></strong></label></dt>
                                    <dd class="b-form-line__content">
                                            <input type="text" name="title" value="<?php echo $article->getTitle() ?>" />
                                            <p class="b-form-note">Заголовок новости</p>

                                    </dd>
                            </dl><!-- /b-form-line__in -->
                            
                            <dl class="b-form-line__in">
                                    <dt class="b-form-line__label"><label for="announce"><strong class="b-form-require">Анонс: <i class="b-ico">*</i></strong></label></dt>
                                    <dd class="b-form-line__content">
                                            <textarea rows="0" style="border: medium none; padding: 0pt; height: 0pt;"></textarea>
                                            <textarea id="article-<?php echo $article->getId() ?>-announce" class="ckeditor" name="announce"><?php echo $article->getAnnounce() ?></textarea>
                                            <p class="b-form-note">Анонс новости</p>

                                    </dd>
                            </dl><!-- /b-form-line__in -->
                            
                            <dl class="b-form-line__in">
                                    <dt class="b-form-line__label"><label for="detail"><strong class="b-form-require">Текст новости: <i class="b-ico">*</i></strong></label></dt>
                                    <dd class="b-form-line__content">
                                            <textarea rows="0" style="border: medium none; padding: 0pt; height: 0pt;"></textarea>
                                            <textarea id="article-<?php echo $article->getId() ?>-detail" class="ckeditor" name="detail"><?php echo $article->getDetail() ?></textarea>
                                            <p class="b-form-note">Подробный текст новости</p>

                                    </dd>
                            </dl><!-- /b-form-line__in -->                            
                            
                            <dl class="b-form-line__in">
                                    <dt class="b-form-line__label"><label for="publishDate"><strong class="b-form-require">Дата публикации: <i class="b-ico">*</i></strong></label></dt>
                                    <dd class="b-form-line__content">
                                            <input type="text" name="publishDate" value="<?php echo $article->getPublishDate() ? $article->getPublishDate()->format('d.m.Y') : '' ?>" />
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
    $('#article-<?php echo $article->getId() ?>-overlay').detach().appendTo('body');        
});
</script>