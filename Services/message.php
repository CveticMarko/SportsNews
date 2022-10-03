<?php

class message
{

    public static function error($str)
    {
        return "<div style='background-color: red; color: white; width:300px'>{$str}</div>";
    }

    public static function succes($str)
    {
        return "<div style='background-color: green; color: white; width:300px'>{$str}</div>";
    }

    public static function info($str)
    {
        return "<div style='background-color: aqua; color: black; width:300px'>{$str}</div>";
    }
}