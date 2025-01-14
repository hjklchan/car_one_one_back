<?php

namespace ResponseHelper {
    // 处理路由不存在的 Api 策略
    function apiRouteNotFound()
    {
        return function () {
            return response()->json([
                "status" => 0,
                "message" => "不存在的路由",
                "data" => null,
            ], 404);
        };
    }

    // 处理路由不存在的 Web 策略
    function webRouteNotFound()
    {
        return response()->view("<h1>不存在的路由</h1>", null, 404);
    }
}

namespace Helper {



    function ok()
    {
    }

    function notFound()
    {
    }

    function serverError()
    {
    }

    function unauthorized()
    {
    }

    function validationError()
    {
    }
}
