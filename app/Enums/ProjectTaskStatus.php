<?php

namespace App\Enums;

enum ProjectTaskStatus
{
    case TODO;
    case INPROGRESS;
    case COMPLETE;

    public function label(): string
    {
        return match($this)
        {
            $this::TODO => 'To Do',
            $this::INPROGRESS => 'In Progress',
            $this::COMPLETE => 'Complete',
        };
    }
}
