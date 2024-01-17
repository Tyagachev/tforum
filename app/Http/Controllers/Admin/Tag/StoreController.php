<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\Tag\TagStoreRequest;

class StoreController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(TagStoreRequest $request)
    {
        $tagName = $request->validated();
        $this->tagService->save($tagName);
        return redirect()->back();
    }
}
