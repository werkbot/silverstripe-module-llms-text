<?php

namespace Werkbot\LLMsText\Tests;

use SilverStripe\Dev\SapphireTest;
use SilverStripe\SiteConfig\SiteConfig;

class LLMsTextTest extends SapphireTest
{
  protected static $fixture_file = 'LLMsTextTest.yml';

  public function testMarkdownValidity()
  {
    $Parsedown = new \Parsedown();

    $fixtureObjects = [
      'SiteConfig' => '<h1>Maple Street Coffee Roasters</h1>',
    ];

    foreach ($fixtureObjects as $fixtureObject => $expectedValue) {
      $object = $this->objFromFixture(SiteConfig::class, $fixtureObject);

      $parsed = $Parsedown->text($object->LLMsText);

      $this->assertEquals($expectedValue, $parsed);
    }
  }

}

