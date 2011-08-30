<?php if (!isset($options['type'])) $options['type'] = 'hidden'; ?>
<?php if ($options['type'] == 'main') : ?>
<div class="b-news-list-head"><span class="b-date">22.07.2011</span></div>
<div class="b-news-list-body">
        <a href="<?php echo $view['router']->generate('news_detail', array('id' => $news->getId())) ?>"><?php echo $news->getTitle() ?></a>
</div>
<?php elseif ($options['type'] == 'short') : ?>
<span class="b-date b-date_news"><?php echo $news->getPublishDate()->format('d.m.Y') ?></span>
<h2 class="b-news-title h3"><?php echo $news->getTitle() ?></h2>
<div class="b-news-content">
        <p>
                <?php echo $news->getAnnounce() ?>
                <br/>
                <a href="<?php echo $view['router']->generate('news_detail', array('id' => $news->getId())) ?>">подробнее »</a>
        </p>
</div>
<?php elseif ($options['type'] == 'full') : ?>
<span class="b-date b-date_news"><?php echo $news->getPublishDate()->format('d.m.Y') ?></span>
<h2 class="b-news-title h3"><?php echo $news->getTitle() ?></h2>
<div class="b-news-content">
    <p><?php echo $news->getAnnounce() ?></p>
    <p><?php echo $news->getDetail() ?></p>
    <a href="<?php echo $view['router']->generate('news_list') ?>">Вернуться в список новостей</a>
</div>
<?php else : ?>
<?php endif; ?>