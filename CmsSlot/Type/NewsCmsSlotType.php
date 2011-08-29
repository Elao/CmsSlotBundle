<?php

/*
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elao\CmsSlotBundle\CmsSlot\Type;

use Elao\CmsSlotBundle\Model\CmsSlot;
use Heliosoft\FinchBundle\Entity\News;

class NewsCmsSlotType extends BaseCmsSlotType
{

    function retrieveParams()
    {
        
    }

    public function getName()
    {

        return 'news';
    }

    public function updateSlot(News $news, $data = array())
    {
        $news->setTitle($data['title']);
        $news->setAnnounce($data['announce']);
        $news->setDetail($data['detail']);
        $news->setPublishDate($data['publishDate']);
    }

    public function getTemplateDisplayParameters(News $news, $options = array())
    {

        /*$slotContent = $news->getContent();

        $value = '';
        if (isset($slotContent['value'])) {
            $value = $slotContent['value'];
        } elseif (isset($parameters['default_value'])) {
            $value = $parameters['default_value'];
        }*/

        return array('news' => $news, 'options' => $options);
    }

    public function getTemplateEditParameters(News $news, $options)
    {

        return array('news' => $news, 'options' => $options);
        
        $slotContent = $news->getContent();

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
                'element_id' => 'editable_' . $news->getCode(),
                'element_name' => $news->getCode(),
                'element_value' => $value,
                'options' => $options
            )
        );
    }

}

