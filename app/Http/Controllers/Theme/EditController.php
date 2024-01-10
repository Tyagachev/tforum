<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Theme $theme)
    {
        $editTheme = $this->repository->getOneObj($theme->id);
        return view('pages.theme.edit',[$theme->id], compact('editTheme'));
    }
}
