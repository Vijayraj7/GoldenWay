<?php

namespace App\Http\Controllers\CronJob;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Income\BinaryIncomeController;
use App\Http\Controllers\Income\LevelIncomeController;
use App\Http\Controllers\Income\StakeIncomeController;
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

class CronJobController extends Controller
{
    public function cronjob_x()
    {
        $binaryincome = new BinaryIncomeController();
        $binaryincome->binaryincome();
        $stakeincome = new StakeIncomeController();
        $stakeincome->stakeincome();
        return "yes";
    }

}