<?php

/*
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elao\CmsSlotBundle\CmsSlot\Type;

use Elao\CmsSlotBundle\Model\CmsSlot;

class JeditableCmsSlotType extends BaseCmsSlotType
{

    public function retrieveParams()
    {
        // Renvoie
    }

    public function getName()
    {
        return 'jeditable';
    }

    public function updateSlot(CmsSlot $slot, $data = array())
    {
        $value = isset($data['value']) ? $data['value'] : '';
        $slot->setContent(array('value' => $value));
    }

    public function getTemplateDisplayParameters(CmsSlot $slot, $parameters = array())
    {
        $slotContent = $slot->getContent();

        $value = '';
        if (isset($slotContent['value'])) {
            $value = $slotContent['value'];
        } elseif (isset($parameters['default_value'])) {
            $value = $parameters['default_value'];
        }

        return array('value' => $value);
    }

    public function getTemplateEditParameters(CmsSlot $slot, $parameters)
    {
        $slotContent = $slot->getContent();

        $value = '';
        if (isset($slotContent['value'])) {
            $value = $slotContent['value'];
        } elseif (isset($parameters['default_value'])) {
            $value = $parameters['default_value'];
        } else {
            $value = 'Edit me';
        }

        $type = 'text';
        if (isset($parameters['type'])) {
            if ($parameters['type'] == 'textarea') {
                $type = 'textarea';
                if (isset($parameters['rich']) && $parameters['rich']) {
                    $type = 'mce';
                }
            }
        }

        $options = array();
        $options['type'] = $type;

        if (isset($parameters['width'])) {
            $options['width'] = $parameters['width'];
        }

        if (isset($parameters['height'])) {
            $options['height'] = $parameters['height'];
        }

        return array (
            'editable' => array (
                'url'           => 'elao_cms_slot_save',
                'element_id'    => 'editable_' . $slot->getCode(),
                'element_name'  => $slot->getCode(),
                'element_value' => $value,
                'options'       => $options
            )
        );
    }
}
