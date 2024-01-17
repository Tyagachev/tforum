<?php

namespace App\Http\Controllers\Theme;

use App\Http\Requests\Theme\ThemeDestroyRequest;

class DestroyController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ThemeDestroyRequest $request)
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
