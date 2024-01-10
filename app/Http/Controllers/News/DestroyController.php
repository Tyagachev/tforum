<?php

namespace App\Http\Controllers\News;

use App\Http\Requests\News\NewsDestroyRequest;
use Illuminate\Http\RedirectResponse;

class DestroyController extends BaseController
{

    /**
     * Удаление новости
     *
     * @param NewsDestroyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(NewsDestroyRequest $request): RedirectResponse
    {
        $id = $request->input();

        $searchObj = $this->service->searchNews($id);
        $deleteImgFile = $this->action->deleteFile($searchObj);

        if ($deleteImgFile) {
            $this->service->delete($searchObj);
            return redirect()->route('index.news')->with('success', 'Новость успешно удалена');
        }
        return redirect()->back()->with('error', 'Не удалость удалить новость');
    }
}
