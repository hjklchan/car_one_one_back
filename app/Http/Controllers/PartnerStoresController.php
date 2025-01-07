<?php

namespace App\Http\Controllers;

use App\Models\PartnerStores;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PartnerStoresController extends Controller
{
    //获取附近门店
    public function getStores()
    {
        $PartnerStores = PartnerStores::all();
        return response()->json([
            'status' => 'success',
            'data' => $PartnerStores
        ],200);
    }
}
