<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\Tag\TagDestroyRequest;

class DestroyController extends BaseController
{
    /**
     * @param TagDestroyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(TagDestroyRequest $request)
    {
        $data = $request->validated();
        $this->tagService->delete($data);
        return redirect()->back();
    }
}
