<?php

namespace Werkbot\LLMsText;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Tab;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataExtension;

class SiteConfigExtension extends DataExtension
{
  private static $db = [
    'LLMsText' => 'Text',
  ];

  /**
   * Adds a textarea field for the llms.txt content to the CMS SiteConfig section.
   * @param FieldList $fields The fields in the CMS SiteConfig section.
   */
  public function updateCMSFields(FieldList $fields)
  {
    $fields->addFieldToTab(
      'Root',
      Tab::create(
        'LLMsText',
        'LLMs Text',
        TextareaField::create('LLMsText', 'llms.txt')
          ->setRows(30)
      )
    );
  }
}
