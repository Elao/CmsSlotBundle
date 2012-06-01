<?php

/*
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elao\CmsSlotBundle\CmsSlot\Type;

use Elao\CmsSlotBundle\Model\CmsSlot;
use Heliosoft\FinchBundle\Entity\Article;

class ArticleCmsSlotType extends BaseCmsSlotType
{

    function retrieveParams()
    {
        
    }

    public function getName()
    {
        return 'article';
    }

    public function updateSlot(Article $article, $data = array())
    {
        $article->setCode($data['article_code']);
        $article->setTitle($data['title']);
        $article->setAnnounce($data['announce']);
        $article->setDetail($data['detail']);
        $article->setPublishDate(new \DateTime($data['publishDate']));
    }

    public function getTemplateDisplayParameters(Article $article, $options = array())
    {

        /*$slotContent = $news->getContent();

        $value = '';
        if (isset($slotContent['value'])) {
            $value = $slotContent['value'];
        } elseif (isset($parameters['default_value'])) {
            $value = $parameters['default_value'];
        }*/

        return array('article' => $article, 'options' => $options);
    }

    public function getTemplateEditParameters(Article $article, $options)
    {

        return array('article' => $article, 'options' => $options);
        
        $slotContent = $article->getContent();

        $value = '';
        if (isset($slotContent['value'])) {
            $value = $slotContent['value'];
        } elseif (isset($options['default_value'])) {
            $value = $options['default_value'];
        } else {
            $value = 'Edit me';
        }

        $type = 'text';
        if (isset($options['type'])) {
            if ($options['type'] == 'textarea') {
                $type = 'textarea';
                if (isset($options['rich']) && $options['rich']) {
                    $type = 'ckeditor';
                }
            }
        }

        $options = array();
        $options['type'] = $type;

        if (isset($options['width'])) {
            $options['width'] = $options['width'];
        }

        if (isset($options['height'])) {
            $options['height'] = $options['height'];
        }

        return array(
            'editable' => array(
                'url' => 'elao_cms_slot_save',
                'element_id' => 'editable_' . $article->getCode(),
                'element_name' => $article->getCode(),
                'element_value' => $value,
                'options' => $options
            )
        );
    }

}

