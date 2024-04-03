<?php

namespace App\Http\Controllers\Admin\SiteRule;

use App\Http\Requests\SiteRule\SiteRuleDestroyRequest;
use Illuminate\Http\RedirectResponse;

class DestroyController extends BaseController
{
    /**
     * Удаление правила из БД
     *
     * @param SiteRuleDestroyRequest $request
     * @return RedirectResponse
     */
    public function __invoke(SiteRuleDestroyRequest $request): RedirectResponse
    {
        $this->siteRuleService->deleteRule($request->validated());

        return redirect()->back();
    }
}
