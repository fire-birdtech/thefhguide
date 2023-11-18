<?php

namespace App\Enums;

enum ContentType: string
{
    case COLLECTION = 'collection';
    case PROJECT = 'project';
    case GOAL = 'goal';
    case CHOICE = 'choice';
}
