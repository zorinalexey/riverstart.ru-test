<?php

namespace App\Utils\Traits;

use Illuminate\Support\Str;

trait Aliasable
{
    final public function setAlias(array &$data, string $keyName): void
    {
        if (isset($data[$keyName])) {
            $data['alias'] = Str::slug($data[$keyName], '_');
        }
    }
}
