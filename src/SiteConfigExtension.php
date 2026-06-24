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
