<?php

namespace App\Http\Controllers\Admin\SiteRule;


use App\Http\Requests\SiteRule\SiteRuleStoreRequest;
use Illuminate\Http\RedirectResponse;

class CreateController extends BaseController
{

    /**
     * Сохраняем правила форума в БД
     *
     * @param SiteRuleStoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(SiteRuleStoreRequest $request): RedirectResponse
    {
        $this->siteRuleService->saveRule($request->validated());

        return redirect()->back();
    }
}
