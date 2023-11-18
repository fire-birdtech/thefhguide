<?php

namespace App\Enums;

enum AllowedUserRoles: string
{
    case ADMIN = 'admin';
    case DEVELOPER = 'developer';
    case EDITOR = 'editor';
    case SUPER_ADMIN = 'super admin';
}
