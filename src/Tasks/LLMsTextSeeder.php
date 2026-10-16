<?php

namespace Werkbot\LLMsText\Tasks;

use Symfony\Component\Console\Input\InputInterface;
use SilverStripe\PolyExecution\PolyOutput;
use Symfony\Component\Console\Command\Command;
use SilverStripe\SiteConfig\SiteConfig;
use Werkbot\Seeder\Tasks\SeederBuildTask;

if (!class_exists(SeederBuildTask::class, false)) return;

class LLMsTextSeeder extends SeederBuildTask
{
  protected string $title = 'Generate llms.txt example';
  protected static string $description = 'Generate a llms.txt example using the current SiteConfig.';
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

  #[Override]
  public function execute(InputInterface $input, PolyOutput $output): int
  {
      parent::execute($input, $output);
      foreach ($this->extraSiteConfigIDs as $extraSiteConfigID) {
        $siteConfig = SiteConfig::get()->byID($extraSiteConfigID);
        if ($siteConfig) $siteConfig->delete();
      }
      return Command::SUCCESS;
  }

}

