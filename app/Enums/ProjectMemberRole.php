<?php

namespace App\Enums;

enum ProjectMemberRole
{
    case OWNER;
    case MANAGER;
    case MEMBER;
    case GUEST;

    public static function list(): array
    {
        $list = [];
        foreach (ProjectMemberRole::cases() as $view) {
            $list[$view->name] = $view->name;
        }
        return $list;
    }
}
