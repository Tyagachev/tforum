<?php

namespace App\Http\Controllers\News;

use App\Http\Requests\News\NewsUpdateRequest;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{

    /**
     * Обновление новости
     *
     * @param NewsUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(NewsUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $objData = $this->service->update($data);
        if ($objData) {
            return redirect()->route('show.news',$data['id'])->with('success', 'Данные успешно обновлены');
        }
        return redirect()->back()->with('error', 'Произошла ошибка обновления данных');
    }
}
