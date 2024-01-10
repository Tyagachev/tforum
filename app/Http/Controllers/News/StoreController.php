<?php

namespace App\Http\Controllers\News;

use App\Http\Requests\News\NewsStoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{

    /**
     * Создание новости
     *
     * @param NewsStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(NewsStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $saveFile = $this->action->saveFile($request);

        if($saveFile) {
            $this->service->save($data, $saveFile);
            return redirect()->route('index.news')->with('success', 'Новость успешно добавена');
        }
        return redirect()->back()->with('error', 'Не удалось сохранить файл');
    }
}
