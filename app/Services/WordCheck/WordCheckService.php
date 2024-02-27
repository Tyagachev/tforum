<?php

namespace App\Services\WordCheck;

use App\Models\WordCheck;

class WordCheckService
{
    /**
     * Сохранение слова в БД
     *
     * @param array $word
     * @return void
     */
    public function save(array $word): void
    {
        $saveWord = new WordCheck([
            'word' => $word['word']
        ]);
        $saveWord->save();
    }

    /**
     * Удаление проверочного слова из БД
     *
     * @param string $wordId
     * @return void
     */
    public function delete(string $wordId): void
    {
        $deleteWord = WordCheck::query()->find($wordId);
        $deleteWord->delete();
    }
}
