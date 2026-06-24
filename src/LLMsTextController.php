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
    return HTTPResponse::create(SiteConfig::current_site_config()?->LLMsText)
      ->addHeader('Content-Type', 'text/plain');
  }

}

