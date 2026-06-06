<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;
use App\Models\TblCustomer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class DashBoardController extends Controller
{

    public function edit($id)
    {
        $h = new HelperController;
        $p = DB::table('pr')->where('id', $id)->first();
        if ($p == null) {
            abort(404);
        }
        foreach ($p as $key => $val) {
            $p->$key = $h->isJson($val) == true ? json_decode($val, true) : $val;
        }
        return $h->getboth('dashboard.vendor.addproduct', ['id' => $id, 'p' => json_encode($p)]);
    }

    public function dashboard()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.index');
    }

    public function walletCreate()
    {
        return view('wallet.create');
    }

    public function admindashboard()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.admin.aindex');
    }

    public function products()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.product');
    }

    public function depositstatus()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.depositstatus');
    }
    public function creditstatus()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.creditstatus');
    }
    public function depositviewstatus($id)
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.depositviewstatus', ['planId' => $id]);
    }
    public function compoundstatus($id)
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.compundstatus', ['cmpId' => $id]);
    }

    public function productbuy()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.buyproduct');
    }
    public function creditbuy()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.transfercreditadd');
    }
    public function reinvest()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.reinvest');
    }
    public function lott()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.lott');
    }
    public function transferfund()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.transferfund');
    }
    public function transactions()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.transactions');
    }
    public function orders()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.allorders');
    }

    public function vendorprofile()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.vendorprofile');
    }

    public function customerprofile()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.customer.customerprofile');
    }
    public function marketsummary()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.marketsummary');
    }
    public function democalculator()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.democalculator');
    }

    public function democalc()
    {
        $h = new HelperController;
        return view('dashboard.vendor.democalc');
    }

    public function profile()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.profile');
    }
    public function refincome()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.refincome');
    }
    public function withdraw($wtyp)
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.withdraw', ['wtyp' => $wtyp]);
    }
    public function withdrawhistory()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.withdrawhistory');
    }
    public function withdrawtransactions()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.withdrawtransactions');
    }
    public function levincome($lev)
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.levincome', ['lev' => $lev]);
    }
    public function reftree()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.reftree');
    }
    public function support()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.support');
    }
    public function reftreep($id)
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.reftree', ['refid' => $id]);
    }

    public function addproduct()
    {
        $h = new HelperController;
        return $h->getboth('dashboard.vendor.addproduct');
    }

}