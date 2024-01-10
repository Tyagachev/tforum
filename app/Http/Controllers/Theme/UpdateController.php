<?php

namespace App\Http\Controllers\Theme;

use App\Http\Requests\Theme\ThemeUpdateRequest;

class UpdateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ThemeUpdateRequest $request)
    {
        $themeValidate = $request->validated();
        $updateTheme = $this->service->updateTheme($themeValidate);
        if ($updateTheme) {
            return redirect()->route('show.theme', $themeValidate['id'])->with('success', 'Тема обновлена');
        }
        return redirect()->back()->with('error', 'Произошла ошибка при обновлении');
    }
}
