<?php

namespace App\Http\Controllers\Stake;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Income\BinaryIncomeController;
use App\Http\Controllers\Income\LevelIncomeController;
use App\Http\Controllers\Income\ReferralIncomeController;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\FcmController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class StakeController extends Controller
{
    public function buy($new_id)
    {

        $ref = new ReferralIncomeController();
        $ref->refincome($new_id);
        $lev = new LevelIncomeController();
        $lev->levelincome($new_id);



    }
}
