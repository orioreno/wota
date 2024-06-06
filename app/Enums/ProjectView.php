<?php

namespace App\Enums;

enum ProjectView
{
    case KANBAN;
    case TABLE;
    case GANTTCHART;
    case CALENDAR;

    public function label(): string
    {
        return match($this)
        {
            $this::KANBAN => 'Kanban board',
            $this::TABLE => 'Table',
            $this::GANTTCHART => 'Gantt chart',
            $this::CALENDAR => 'Calendar',
        };
    }

    public static function list(): array
    {
        $list = [];
        foreach (ProjectView::cases() as $view) {
            $list[$view->name] = $view->label();
        }
        return $list;
    }
}
