<?php

namespace App\Domain\Enums;

enum EnumStatus: string
{
    case PENDING = 'pending';

    case COMPLETE = 'completed';

}
