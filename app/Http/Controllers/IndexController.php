<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @OA\Info(version="1.0",
 * title="Resources API",
 * description="Ma superbe API")
 */

class IndexController extends Controller
{
    /**
     * @OA\Get(
     *      path="/index",
     *      tags={"Tags"},
     *      summary="Welcome page",
     *      description="Description",
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *       ),
     *     )
     */

    public function index() {}
}
