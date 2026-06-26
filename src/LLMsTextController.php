<?php

namespace Werkbot\LLMsText;

use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Control\HTTPResponse;

class LLMsTextController extends Controller
{
  /**
   * Respond with the llms.txt content
   *
   * @param HTTPRequest $request
   * @return HTTPResponse
   */
  public function index(HTTPRequest $request)
  {
    $property = $request->getURL() == 'llms-full.txt' ? 'LLMsFullText' : 'LLMsText';
    return HTTPResponse::create(SiteConfig::current_site_config()?->$property)
      ->addHeader('Content-Type', 'text/plain');
  }

}

