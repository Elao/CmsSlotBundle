ElaoCmsSlotBundle
==========================

ElaoCmsSlotBundle implements a low-level cms slot management. 
It allows you to integrate editable slots in your application.


Installation
------------

`Download`_ the bundle and put it under the ``Elao\CmsSlotBundle\`` namespace.
Then include it in your Kernel class::

    public function registerBundles()
    {
        $bundles = array(
            new Elao\CmsSlotBundle\ElaoCmsSlotBundle(),
        );
    }

Configuration
-------------

All features provided by the bundle are enabled by default when the bundle is
registered in your Kernel class.

The default configuration is as follow:

.. configuration-block::

    .. code-block:: yaml

        elao_cms_slot:
            db_driver:          orm             # or odm (not implemented yet)
            slot_provider:      serviceid       # Set a slot provider service 
                                                # (or use the orm or odm default one if not set)
            i18n:               true            # enable or not culture dependent slots (translator service required)
            permission:         SLOT_EDITOR     # permissions needded to edit slot (security context service required)
            types:
              jeditable:                        # Configure jeditable slot types
                tinymce:                        # Configure Tinymce
                  enable:       true            # Enable tinymce
                  path:         /js/tinymce     # Set the tinymce path


db_driver:      This option is just use to know wich default slot_provider to use if the slot_provider is not set.
slot_provider:  This options allows you to specify a slot provider service
i18n:           false by default. If this option is set. All slot name will be suffixed by the current locale.
permission:     Required permission to edit slots


Cms Slot Provider Service
---------------------------

Cms Slot Provider service must implement the CmsSlotProviderInterface.
Given a slot code, it must return a CmsSlot object. The bundle comes with a
default Cms Slot Provider (CmsSlotRepository).


Cms Slot Manager Service
---------------------------

Cms Slot Manager service is the central point of the bundle.
His role is to:
- Register Cms Slot Types
- Interface with the Cms Slot Provider Service


Cms Slot Object
---------------------------

Cms Slot Objects are just objects to store slot's content.


Cms Slot Types
---------------------------

Cms Slot Types describe the way to display a slot content, and the way to edit
a slot content. They must implements the CmsSlotTypeInterface. 
Cms Slot Types have two associated templates: One for displaying slot data (display mode),
and one for editing the slot data (edit mode).

Cms Slot Types are tagged services (the tag is "elao.cms_slot.type" and accept
to attributes: template_display and template_edit).

.. configuration-block::

    .. code-block:: xml
    <services>
        <service id="elao.cms_slot.type.jeditable" class="%elao.cms_slot.type.jeditable.class%" public="false">
            <tag name="elao.cms_slot.type" template_display="ElaoCmsSlotBundle:CmsSlotType:jeditable_display.html.twig" template_edit="ElaoCmsSlotBundle:CmsSlotType:jeditable_edit.html.twig" />
        </service>
    </services>
	
The bundle comes by default with one Slot Type : jeditable


Cms Slot Twig Extension
---------------------------

The Twig extension allows you to integrate the slots in your apps by adding the twig
function cms_slot(). The cms_slot() function takes 3 parameters: the slot type, the slot name
and the slot parameters.



Examples
---------------------------

// Simple input text
{{ cms_slot('jeditable', 'ABOUTUS_TEXT', {'type': 'text', 'width': '100%', 'height': '300'}) }}

// Simple textarea
{{ cms_slot('jeditable', 'ABOUTUS_TEXT', {'type': 'textarea', 'width': '100%', 'height': '300'}) }}

// Will use tinymce
{{ cms_slot('jeditable', 'ABOUTUS_TEXT', {'type': 'textarea', 'rich': true, 'width': '100%', 'height': '300'}) }}





TODO
---------------------------

* Create odm classes
* Create php templating helpers


.. _`Download`: http://github.com/Elao/CmsSlotBundle
