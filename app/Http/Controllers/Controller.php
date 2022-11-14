<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *   version="1.0.0",
 *   x={"logo": { "url": "https://sprintdevs.com/src/images/sprintdevs_logo_mini.png" }},
 *   title="Hotel Management | Sprint Devs",
 *   description="A complete solution for hotel management, by Sprint Devs",
 *   @OA\Contact(email="support@sprintdevs.com")
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
