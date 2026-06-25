<?php

namespace Werkbot\LLMsText;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Tab;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataExtension;

class SiteConfigExtension extends DataExtension
{
  private static $db = [
    'LLMsText' => 'Text',
    'LLMsFullText' => 'Text',
  ];

  /**
   * Adds textarea fields for the llms.txt and llms-full.txt contents to the CMS SiteConfig section.
   * @param FieldList $fields The fields in the CMS SiteConfig section.
   */
  public function updateCMSFields(FieldList $fields)
  {
    $fields->addFieldToTab(
      'Root',
      Tab::create(
        'LLMsTextTab',
        'LLMs Text',
        TabSet::create(
          'LLMsTextTabset',
          Tab::create(
            'LLMsTextTabInner',
            'LLMs Text',
            TextareaField::create('LLMsText', 'llms.txt')
              ->setRows(30)
          ),
          Tab::create(
            'LLMsFullTextTab',
            'LLMs Full Text',
            TextareaField::create('LLMsFullText', 'llms-full.txt')
              ->setRows(30)
          )
        )
      )
    );
  }
}
