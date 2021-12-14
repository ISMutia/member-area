<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserType extends Enum
{
    public const Admin = 'admin';
    public const Customer = 'customer';
}
