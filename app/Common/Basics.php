<?php

namespace App\Common;


class Basics
{
    public static function imgStoreFolder()
    {
        $root_folder = config('app.root_folder');
        return str_replace( $root_folder, env('APP_IMAGES_FOLDER'), base_path());
    }
}