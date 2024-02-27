<?php

namespace App\Http\Controllers\Admin\WordCheck;

use App\Http\Requests\WordCheck\WordCheck;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    /**
     * Сохранение проверочного слова
     *
     * @param WordCheck $request
     * @return RedirectResponse
     */
    public function __invoke(WordCheck $request): RedirectResponse
    {
        $word = $request->validated();
        $this->wordService->save($word);

        return redirect()->back();
    }
}
