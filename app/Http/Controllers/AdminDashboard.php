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


class AdminDashboard extends Controller
{
    public function admindashboard()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.allcustomers');
    }
    public function transactions()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.aindex');
    }
    public function customers()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.allcustomers');
    }
    public function incomeAnalytics()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.allincome');
    }
    public function detailedIncome()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.detailedincome');
    }
    public function volumeDetails()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.volumedetails');
    }
    public function p2pTransfers()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.p2ptransfers');
    }
    public function allTransfers()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.alltransfers');
    }
    public function productrequests()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.productrequests');
    }
    public function lotthistory()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.lotthistory');
    }
    public function lottbox()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.lottboxhistory');
    }
    public function reftree()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.reftree');
    }
    public function creditrequests()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.creditaddrequests');
    }
    public function productrequestsview($id)
    {
        checkadmin();
        $h = new HelperController;
        $prdct = DB::table('customer_plans')
            ->where('id', $id)
            ->first();
        if ($prdct == null) {
            return abort(404);
        }
        return $h->getboth('dashboard.admin.productrequestsview', ['prdct' => $prdct]);
    }
    public function creditaddrequestsview($id)
    {
        checkadmin();
        $h = new HelperController;
        $prdct = DB::table('credit_add')
            ->where('id', $id)
            ->first();
        if ($prdct == null) {
            return abort(404);
        }
        return $h->getboth('dashboard.admin.creditaddrequestsview', ['prdct' => $prdct]);
    }
    public function withdrawrequests()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.withdrawrequests');
    }
    public function withdrawrequestsview($id)
    {
        checkadmin();
        $h = new HelperController;
        $withdraw = DB::table('customer_withdraws')
            ->where('id', $id)
            ->first();
        if ($withdraw == null) {
            return abort(404);
        }
        return $h->getboth('dashboard.admin.withdrawrequestsview', ['withdraw' => $withdraw]);
    }

    public function supportstatus()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.supportstatus');
    }

    public function user($id)
    {
        checkadmin();
        $h = new HelperController;
        $pusr = DB::table('customers')->where('id', $id)->first();
        if ($pusr == null) {
            abort(404);
        }
        return $h->getboth('dashboard.admin.userprofile', ['usrid' => $id, 'pusr' => $pusr]);
    }

    public function transferFundFree()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.transferfundfree');
    }

    public function adminAutopoolHistory()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.autopoolhistory');
    }

    public function adminSubscriptionHistory()
    {
        checkadmin();
        $h = new HelperController;
        return $h->getboth('dashboard.admin.subscriptionhistory');
    }

    public function changePassword(Request $rqs)
    {
        checkadmin();
        $rqs->validate([
            'customer_id' => 'required|exists:customers,id',
            'password_type' => 'required|in:login,transaction',
            'new_password' => 'required|min:4'
        ]);

        $customerId = $rqs->input('customer_id');
        $type = $rqs->input('password_type');
        $newPass = $rqs->input('new_password');

        $ve = DB::table("customers")->where('id', $customerId)->first();
        if ($ve == null) {
            return redirect()->back()->withErrors(['error' => 'Customer not found.']);
        }

        $h = new HelperController;

        if ($type === 'login') {
            $h->toTableupdate("customers", ['id' => $ve->id, 'password' => \Illuminate\Support\Facades\Hash::make($newPass)]);
            // Update laravel user password as well if user exists
            $user = \App\Models\User::where('email', $ve->email)->first();
            if ($user != null) {
                $user->password = $newPass;
                $user->save();
            }
            $message = 'Login password updated successfully!';
        } else {
            $h->toTableupdate("customers", ['id' => $ve->id, 'tpassword' => \Illuminate\Support\Facades\Hash::make($newPass)]);
            $message = 'Transaction password updated successfully!';
        }

        return redirect()->back()->withErrors(['success' => $message]);
    }

}