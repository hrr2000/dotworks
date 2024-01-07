<?php

// convert entity name to a slug example: "service name" => "service-name"
if (!function_exists('slugify')) {
    function slugify(string $name) {
        return str_replace(' ','-', strtolower($name));
    }
}

if(!function_exists('time_stamps_to_date')) {
    function time_stamps_to_date(string $timestamp) {
        return date('d/m/Y', strtotime($timestamp));
    }
}

if(!function_exists('get_temp_path')) {
    function get_temp_path(): string {
        return 'temp/' . date('Y-m-d');
    }
}

if(!function_exists('generate_file_name')) {
    function generate_file_name(string $type, $file): string {
        return $type . '_' . time() . '.' . $file->getClientOriginalExtension();
    }
}
