<?php

namespace App\Services\SiteRule;

use App\Models\SiteRule;

class SiteRuleService
{
    /**
     * Сохранение правила
     *
     * @param array $rule
     * @return void
     */
    public function saveRule(array $rule): void
    {
        $ruleField = [
            'paragraph' => $rule['paragraph'],
            'rule' => ("\r\n") ? str_replace("\r\n",'<br>', $rule['rule'])
                : str_replace("\r\n",'<br><br>', $rule['rule']),
        ];

        $ruleObj = new SiteRule();

        $ruleObj->create($ruleField);
    }

    /**
     * Удаление правила
     *
     * @param array $ruleId
     * @return void
     */
    public function deleteRule(array $ruleId): void
    {
        SiteRule::query()->find($ruleId['id'])->delete();
    }
}
