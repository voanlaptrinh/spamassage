
<?php

use App\Models\ConfigServer;
use App\Models\Course;
use App\Models\Policie;
use App\Models\WebConfig;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


function get_config()
{
    return ConfigServer::find(1);
}

