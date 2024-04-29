<?php

namespace App\Models;

enum EventStatus: string
{
    case Published = 'published';
    case Draft = 'draft';
}
