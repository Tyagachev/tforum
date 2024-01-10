<?php

namespace App\Http\Controllers\Theme;

use App\Http\Requests\Theme\ThemeStoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    /**
     * Запись в БД
     *
     * @param ThemeStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(ThemeStoreRequest $request): RedirectResponse
    {
        $validateField = $request->validated();

        $saveImage = $this->action->saveImageFile($request);
        if ($saveImage) {
            $this->service->saveTheme($validateField, $saveImage);
            return redirect()->route('welcome');
        }
        return redirect()->back();
    }
}
