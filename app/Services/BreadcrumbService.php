<?php

namespace App\Services;

class BreadcrumbService
{
    protected $breadcrumbs = [];

    public function add($title, $url = null): void
    {
        $this->breadcrumbs[] = [
            'title' => $title,
            'url' => $url,
        ];
    }

    public function get()
    {
        return $this->breadcrumbs;
    }
}
