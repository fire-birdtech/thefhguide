<?php

namespace App\Enums;

enum AssignmentStatus: string
{
    case WAITING = 'waiting';
    case STARTED = 'started';
    case COMPLETE = 'complete';
}