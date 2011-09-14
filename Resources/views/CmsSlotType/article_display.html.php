<?php if (!isset($options['type'])) $options['type'] = 'hidden'; ?>
<?php if ($options['type'] == 'main') : ?>
<div class="b-news-list-head"><span class="b-date"><?php echo $article->getPublishDate()->format('d.m.Y') ?></span></div>
<div class="b-news-list-body">
        <a href="<?php echo $view['router']->generate('artile_detail', array('id' => $article->getId())) ?>"><?php echo $article->getTitle() ?></a>
</div>
<?php elseif ($options['type'] == 'short') : ?>
<span class="b-date b-date_news"><?php echo $article->getPublishDate()->format('d.m.Y') ?></span>
<h2 class="b-news-title h3"><?php echo $article->getTitle() ?></h2>
<div class="b-news-content">
        <?php echo $article->getAnnounce() ?>
        <a href="<?php echo $view['router']->generate('article_detail', array('id' => $article->getId())) ?>">подробнее »</a>
</div>
<?php elseif ($options['type'] == 'full') : ?>
<span class="b-date b-date_news"><?php echo $article->getPublishDate()->format('d.m.Y') ?></span>
<h2 class="b-news-title h3"><?php echo $article->getTitle() ?></h2>
<div class="b-news-content">
    <p><?php echo $article->getAnnounce() ?></p>
    <p><?php echo $article->getDetail() ?></p>
    <a href="<?php echo $view['router']->generate('article_list') ?>">Вернуться в список статей</a>
</div>
<?php else : ?>
<?php endif; ?>