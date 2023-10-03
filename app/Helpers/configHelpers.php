<?php

namespace  APP\Helpers;

use App\Models\Configuration;
class configHelpers

{


    public static  function getAppName()

    {

            $configname = Configuration::where('type' ,'APP_NAME')->value('value') ;

        return $configname;
    }

}