<?php

namespace App\Http\Controllers\Admin\SiteRule;

use App\Http\Controllers\Controller;
use App\Services\SiteRule\SiteRuleService;
class BaseController extends Controller
{
    public SiteRuleService $siteRuleService;
    public function __construct(SiteRuleService $siteRuleService)
    {
        $this->siteRuleService = $siteRuleService;
    }
}
