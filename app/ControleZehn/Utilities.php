<?php
use Illuminate\Support\Facades\Request;

class Utilities
{
    public static function setActiveMenu($uri, $isParent = false)
    {
        $class = ($isParent) ? 'active open' : 'active';
        return Request::is($uri) ? $class : '';
    }

    public static function setActiveSubMenu($uri, $isParent = false)
    {
        return Request::is($uri) ? 'current-page' : '';
    }
}
