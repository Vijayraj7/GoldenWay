<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HelperController;
use Illuminate\Http\File;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class ViewController extends Controller
{

    public function home(Request $rq)
    {
        $ps = DB::table('pr')->get();
        $tys = DB::table('pr')->select('type')->distinct()->get();

        for ($i = 0; $i < count($tys); $i++) {
            $tys[$i]->img = DB::table('pr')->where('type', $tys[$i]->type)->select('img')->first()->img;
            $tys[$i]->date = DB::table('pr')->where('type', $tys[$i]->type)->select('created_at')->first()->created_at;
        }

        // dd($ps);
        $h = new HelperController;
        for ($i = 0; $i < count($ps); $i++) {
            foreach ($ps[$i] as $key => $val) {
                $ps[$i]->$key = $h->isJson($val) == true ? json_decode($val, true) : $val;
            }
        }
        return view('home', ['ps' => $ps, 'tys' => $tys]);
    }
    public function contact(Request $rq)
    {
        $ps = DB::table('pr')->get();
        $tys = DB::table('pr')->select('type')->distinct()->get();

        for ($i = 0; $i < count($tys); $i++) {
            $tys[$i]->img = DB::table('pr')->where('type', $tys[$i]->type)->select('img')->first()->img;
            $tys[$i]->date = DB::table('pr')->where('type', $tys[$i]->type)->select('created_at')->first()->created_at;
        }

        // dd($ps);
        $h = new HelperController;
        for ($i = 0; $i < count($ps); $i++) {
            foreach ($ps[$i] as $key => $val) {
                $ps[$i]->$key = $h->isJson($val) == true ? json_decode($val, true) : $val;
            }
        }
        return view('contact.contact', ['ps' => $ps, 'tys' => $tys]);
    }

    public function shop(Request $rq)
    {

        $subc = 0;
        if (session()->hasOldInput('type_list')) {
            $subc = 1;
        }
        if (session()->hasOldInput('sub_list')) {
            $subc = count(old('sub_list'));
            $subc = $subc + 1;
        }
        if (session()->hasOldInput()) {
            // $src = old('srch');
            // if (!is_null($src)) {
            //     return old('srch');
            // }
            // return old();


            $ps = DB::table('pr')->where(function ($query) use ($rq) {
                if (isset ($_GET['typ'])) {
                    // foreach (old('type_list') as $item) {
                    $query->orWhere('type', '=', $_GET['typ']);
                    // }
                }if (isset ($_GET['s'])) {
                    // foreach (old('type_list') as $item) {
                    $query->orWhere('name', 'like', '%' . $_GET['s'] . '%');
                    // }
                }
                if (session()->hasOldInput('type_list')) {
                    foreach (old('type_list') as $item) {
                        $query->orWhere('type', '=', $item);
                    }
                }
                if (session()->hasOldInput('sub_list')) {
                    $sst = '["';
                    for ($h = 0; $h < count(old('sub_list')); $h++) {
                        if (($h + 1) == count(old('sub_list'))) {
                            $sst .= (old('sub_list')[$h] . '"');
                        } else {
                            $sst .= (old('sub_list')[$h] . '","');
                        }
                    }
                    echo "<script> console.log('$sst'); </script>";
                    $query->where('subs', 'like', $sst . '%');
                    // dd($sst);
                }
                $min_value = old('min');
                $max_value = old('max');
                if (!is_null($min_value) && !is_null($max_value)) {
                    $query->whereRaw('CAST(price AS UNSIGNED) BETWEEN ? AND ?', [$min_value, $max_value]);
                } elseif (!is_null($min_value)) {
                    $query->whereRaw('CAST(price AS UNSIGNED) >= ?', [$min_value]);
                } elseif (!is_null($max_value)) {
                    $query->whereRaw('CAST(price AS UNSIGNED) <= ?', [$max_value]);
                }
                $src = old('srch');
                if (!is_null($src)) {
                    $query
                        ->where('name', 'LIKE', "%{$src}%")
                        ->orWhere('subs', 'LIKE', "%{$src}%")
                        ->orWhere('adds', 'LIKE', "%{$src}%")
                        ->orWhere('params', 'LIKE', "%{$src}%")
                        ->orWhere('desc', 'LIKE', "%{$src}%")
                        ->orWhere('type', 'LIKE', "%{$src}%")
                        ->orWhere('price', 'LIKE', "%{$src}%")
                        ->orWhere('count', 'LIKE', "%{$src}%");
                }
            })->get();
            $h = new HelperController;
            for ($i = 0; $i < count($ps); $i++) {
                foreach ($ps[$i] as $key => $val) {
                    $ps[$i]->$key = $h->isJson($val) == true ? json_decode($val, true) : $val;
                }
            }
            $tss = DB::table('pr')->select('type')->distinct()->get();
            $alsc = 0;
            foreach ($ps as $p) {
                if (isset($p->subs[($subc - 1)])) {
                    $alsc++;
                }
            }
            if ($alsc == 0) {
                $subc = ($subc - 1);
            }
            $allps = DB::table('pr')->where(function ($query) use ($rq) {
                if (session()->hasOldInput('type_list')) {
                    foreach (old('type_list') as $item) {
                        $query->orWhere('type', '=', $item);
                    }
                }
            })->get();
            for ($i = 0; $i < count($allps); $i++) {
                foreach ($allps[$i] as $key => $val) {
                    $allps[$i]->$key = $h->isJson($val) == true ? json_decode($val, true) : $val;
                }
            }
            return view('shop.shp', ['ps' => $ps, 'allps' => $allps, 'ts' => $tss, 'subc' => $subc]);
        } else {
            $ps = DB::table('pr')->get();
            $allps = DB::table('pr')->get();
            $h = new HelperController;
            for ($i = 0; $i < count($ps); $i++) {
                foreach ($ps[$i] as $key => $val) {
                    $ps[$i]->$key = $h->isJson($val) == true ? json_decode($val, true) : $val;
                }
            }
            $tss = DB::table('pr')->select('type')->distinct()->get();
            return view('shop.shp', ['ps' => $ps, 'allps' => $allps, 'ts' => $tss, 'subc' => $subc]);
        }
    }

    public function postshop(Request $rq)
    {
        return Redirect::to('/shop')->withInput();
    }

    public function checkout($id)
    {
        $h = new HelperController;
        $ps = DB::table('pr')->where('id', $id)->get();
        if (count($ps) > 0) {
            // dd($ps);
            $aaps = DB::table('pr')->where('id', $ps[0]->id)->get();
            for ($i = 0; $i < count($aaps); $i++) {
                foreach ($aaps[$i] as $key => $val) {
                    $aaps[$i]->$key = $h->isJson($val) == true ? json_decode($val, true) : $val;
                }
            }
            $sv = DB::table("customers")->where('id', $ps[0]->vid)->first();
            $spv = DB::table('pv')->where('vid', $sv->id)->first();
            $sid = strval($sv->id);
            $rn1 = strval(rand(1, 100));
            $rn2 = strval(rand(1, 1000));
            $dt = date('d/m/Y');
            $invo = $sid . '/' . $rn1 . '/' . $rn2 . '/' . $dt;
            return $h->getboth('checkout.checkout', ['ps' => $ps, 'aaps' => $aaps, 'sv' => $sv, 'spv' => $spv, 'invo' => $invo]);
        } else {
            abort(404);
        }
    }

    public function vendors(Request $rq)
    {
        $alv = DB::table("customers")->get();
        if (isset($_GET['src'])) {
            $alv = DB::table("customers")->orWhere('name', 'like', '%' . $_GET['src'] . '%')->orWhere('address', 'like', '%' . $_GET['src'] . '%')->get();
        }
        $ps = DB::table('pr')->get();
        $tys = DB::table('pr')->select('type')->distinct()->get();

        for ($i = 0; $i < count($tys); $i++) {
            $tys[$i]->img = DB::table('pr')->where('type', $tys[$i]->type)->select('img')->first()->img;
            $tys[$i]->date = DB::table('pr')->where('type', $tys[$i]->type)->select('created_at')->first()->created_at;
        }

        // dd($ps);
        $h = new HelperController;
        for ($i = 0; $i < count($ps); $i++) {
            foreach ($ps[$i] as $key => $val) {
                $ps[$i]->$key = $h->isJson($val) == true ? json_decode($val, true) : $val;
            }
        }
        return view('all.allvendors', ['ps' => $ps, 'alv' => $alv, 'tys' => $tys]);
    }

    public function vendordetail($id)
    {

        $h = new HelperController;
        $alv = DB::table("customers")->where('id', $id)->get();
        if (count($alv) > 0) {
            $ps = DB::table('pr')->where('vid', $id)->get();
            $tys = DB::table('pr')->select('type')->distinct()->get();
            $pv = DB::table('pv')->where('vid', $id)->first();

            if ($pv == null) {
                abort(404);
            }
            if (!isset($pv->factoryname)) {
                abort(404);
            }
            if ($alv[0]->type != 'vendor') {
                abort(404);
            }

            foreach ($pv as $key => $val) {
                $pv->$key = $h->isJson($val) == true ? json_decode($val, true) : $val;
            }

            for ($i = 0; $i < count($tys); $i++) {
                $tys[$i]->img = DB::table('pr')->where('type', $tys[$i]->type)->select('img')->first()->img;
                $tys[$i]->date = DB::table('pr')->where('type', $tys[$i]->type)->select('created_at')->first()->created_at;
            }

            // dd($ps); 
            $h = new HelperController;
            for ($i = 0; $i < count($ps); $i++) {
                foreach ($ps[$i] as $key => $val) {
                    $ps[$i]->$key = $h->isJson($val) == true ? json_decode($val, true) : $val;
                }
            }
            return view('all.vendordetail', ['ps' => $ps, 'pv' => $pv, 'alv' => $alv, 'tys' => $tys]);
        } else {
            abort(404);
        }
    }


}