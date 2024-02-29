<?php

namespace App\Http\Controllers\Theme;

use App\Http\Requests\Theme\ThemeDestroyRequest;
use Illuminate\Http\RedirectResponse;

class DestroyController extends BaseController
{
    /**
     * Удаление темы
     *
     * @param ThemeDestroyRequest $request
     * @return RedirectResponse
     */
    public function __invoke(ThemeDestroyRequest $request): RedirectResponse
    {
        $themeId = $request->input();

        $themeForDestroy = $this->service->searchTheme($themeId['id']);

        $themeFileIsDestroy = $this->action->deleteImageFile($themeForDestroy);

        if ($themeFileIsDestroy) {
            $themeForDestroy->delete();
            return redirect()->route('welcome');
        }
        return redirect()->back()->with('error', 'Произошла ошибка при удалении');
    }
}
