<?php

namespace Werkbot\LLMsText\Tasks;

use SilverStripe\SiteConfig\SiteConfig;
use Werkbot\Seeder\Tasks\SeederBuildTask;

if (!class_exists(SeederBuildTask::class)) {
  return;
}

class LLMsTextSeeder extends SeederBuildTask
{
  protected $title = 'Generate llms.txt example';
  protected $description = 'Generate a llms.txt example using the current SiteConfig.';
  protected $enabled = true;

  protected $fixtureFileName = 'LLMsTextSeeder.yml';

  private $extraSiteConfigIDs = [];

  public function createObjectCallback($obj, $class, $data)
  {
    $siteConfig = SiteConfig::current_site_config();
    $siteConfig->LLMsText = $data['LLMsText'];
    $siteConfig->write();

    $this->extraSiteConfigIDs[] = $obj->ID;
  }

  public function run($request)
  {
    parent::run($request);

    foreach ($this->extraSiteConfigIDs as $extraSiteConfigID) {
      $siteConfig = SiteConfig::get()->byID($extraSiteConfigID);
      if ($siteConfig) $siteConfig->delete();
    }
  }

}

