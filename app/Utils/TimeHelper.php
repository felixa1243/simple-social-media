<?php

namespace App\Utils;

class TimeHelper
{
    public static function timeAgo($time)
    {
        $time = strtotime($time);
        $time_diff = time() - $time;
        if ($time_diff < 60) {
            return 'just now';
        } elseif ($time_diff < 3600) {
            return round($time_diff / 60) . ' minutes ago';
        } elseif ($time_diff < 86400) {
            return round($time_diff / 3600) . ' hours ago';
        } elseif ($time_diff < 604800) {
            return round($time_diff / 86400) . ' days ago';
        } elseif ($time_diff < 2592000) {
            return round($time_diff / 604800) . ' weeks ago';
        } elseif ($time_diff < 31536000) {
            return round($time_diff / 2592000) . ' months ago';
        } else {
            return round($time_diff / 31536000) . ' years ago';
        }
    }
}
