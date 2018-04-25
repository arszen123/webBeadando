<?php

namespace Util;

class Password
{
    public static function hash($data)
    {
        return hash('sha256', $data);
    }
}