<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class Videmost extends Model
{
    use HasFactory;

    protected $table = 'videmosts';

    protected $guarded = [];

    public static function joriyBaho($jurnal_id)
    {
        $count_negatives = 2;
        $count_oraliq_yakuniy = 0;

        $baho_array = [1, 2, 3, 4, 5];
        $jurnal = Jurnal::where('id', $jurnal_id)->first();
        $guruh_id = $jurnal->guruh_id;
        $kursants = Tinglovchi::where(['guruh_id' => $guruh_id, 'ohtm_id' => auth()->user()->ohtm_id])->get();
        $dars_kuns_joriy = Dars_kun::select('id')->where(['jurnal_id' => $jurnal_id, 'ohtm_id' => auth()->user()->ohtm_id, 'nazorat_turi_id' => 3])->get()->toArray();
        $dars_kuns_mt = Dars_kun::select('id')->where(['jurnal_id' => $jurnal_id, 'ohtm_id' => auth()->user()->ohtm_id, 'nazorat_turi_id' => 4])->get()->toArray();
        $dars_kuns_yakuniy = Dars_kun::select('id')->where(['jurnal_id' => $jurnal_id, 'ohtm_id' => auth()->user()->ohtm_id, 'nazorat_turi_id' => 2])->get()->toArray();
        $dars_kuns_oraliq = Dars_kun::select('id')->where(['jurnal_id' => $jurnal_id, 'ohtm_id' => auth()->user()->ohtm_id, 'nazorat_turi_id' => 1])->get()->toArray();
        $dars_kuns_qt = Dars_kun::select('id')->where(['jurnal_id' => $jurnal_id, 'ohtm_id' => auth()->user()->ohtm_id, 'nazorat_turi_id' => 5])->get()->toArray();


        $kursants = Tinglovchi::where(['ohtm_id' => auth()->user()->ohtm_id, 'guruh_id' => $guruh_id])->get();
        $modelName = 'App\Models\Baho' . auth()->user()->ohtm_id; // App\Models\Baho1
        $model = new $modelName;
        $five = 0;
        $four = 0;
        $three = 0;
        $two = 0;



        $bahos_negativ_joriy = $model::leftJoin('dars_kuns', 'dars_kun_id', '=', 'dars_kuns.id')
            ->where(['dars_kuns.nazorat_turi_id'=> 3,'dars_kuns.ohtm_id'=>auth()->user()->ohtm_id])
            ->whereIn('dars_kun_id', $dars_kuns_joriy)->whereNotIn('baho_id', $baho_array)
            ->select('dars_kuns.mavzu_id as mavzu_id', 'tinglovchi_id', 'dars_kuns.jurnal_id as jurnal_id')->get()->toArray();

        $bahos_negativ_oraliq = $model::leftJoin('dars_kuns', 'dars_kun_id', '=', 'dars_kuns.id')
            ->where(['dars_kuns.nazorat_turi_id'=> 1,'dars_kuns.ohtm_id'=>auth()->user()->ohtm_id])
            ->whereIn('dars_kun_id', $dars_kuns_joriy)->whereNotIn('baho_id', $baho_array)
            ->select('dars_kuns.mavzu_id as mavzu_id', 'tinglovchi_id', 'dars_kuns.jurnal_id as jurnal_id')->get()->toArray();

        $bahos_negativ_yakuniy = $model::leftJoin('dars_kuns', 'dars_kun_id', '=', 'dars_kuns.id')
            ->where(['dars_kuns.nazorat_turi_id'=> 2,'dars_kuns.ohtm_id'=>auth()->user()->ohtm_id])
            ->whereIn('dars_kun_id', $dars_kuns_joriy)->whereNotIn('baho_id', $baho_array)
            ->select('dars_kuns.mavzu_id as mavzu_id', 'tinglovchi_id', 'dars_kuns.jurnal_id as jurnal_id')->get()->toArray();


        $baho_qt = $model::leftJoin('dars_kuns', 'dars_kun_id', '=', 'dars_kuns.id')
            ->where(['dars_kuns.nazorat_turi_id'=> 5 ,'dars_kuns.ohtm_id'=>auth()->user()->ohtm_id])
            ->whereIn('baho_id', $baho_array)
            ->select('dars_kuns.mavzu_id as mavzu_id', 'tinglovchi_id', 'dars_kuns.jurnal_id as jurnal_id')->get()->toArray();


        foreach ($kursants as $k){
            $cnt = 0;
            $k->holat = true;
            foreach ($bahos_negativ_joriy as $neg) {
                if(!in_array($neg, $baho_qt)){
                    if($k->id == $neg['tinglovchi_id']){
                        $cnt++;
                    }
                }
            }
            if($cnt>$count_negatives){
                $k->holat = false;
            }
        }

//        foreach ($kursants as $k){
//            $cnt = 0;
//            $k->holat = true;
//            foreach ($bahos_negativ_yakuniy as $neg) {
//                if(!in_array($neg, $baho_qt)){
//                    if($k->id == $neg['tinglovchi_id']){
//                        $cnt++;
//                    }
//                }
//            }
//            if($cnt>$count_oraliq_yakuniy){
//                $k->holat = false;
//            }
//        }

        foreach ($kursants as $k) {
            $k->bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_joriy)->whereIn('baho_id', $baho_array)->where('tinglovchi_id', $k->id)->pluck('baho_id')->toArray();
            $k->mt_bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_mt)->whereIn('baho_id', $baho_array)->where('tinglovchi_id', $k->id)->pluck('baho_id')->toArray();
            $k->oraliq_baho = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_oraliq)->whereIn('baho_id', $baho_array)->where('tinglovchi_id', $k->id)->pluck('baho_id')->toArray();
            $k->yakuniy_baho = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_yakuniy)->whereIn('baho_id', $baho_array)->where('tinglovchi_id', $k->id)->pluck('baho_id')->toArray();
            $k->qt_baho = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_qt)->whereIn('baho_id', $baho_array)->where('tinglovchi_id', $k->id)->pluck('baho_id')->toArray();
            $k->bahos = array_merge($k->bahos, $k->qt_baho);
        }

        if ($jurnal->yakuniy == true && $jurnal->oraliq == true) {
            foreach ($kursants as $k){
                $cnt = 0;
                $k->holat = true;
                foreach ($bahos_negativ_oraliq as $neg) {
                    if(!in_array($neg, $baho_qt)){
                        if($k->id == $neg['tinglovchi_id']){
                            $cnt++;
                        }
                    }
                }
                if($cnt>$count_oraliq_yakuniy){
                    $k->holat = false;
                }
            }

//        dd($kursants[0]->bahos);
            foreach ($kursants as $k) {
                count($k->bahos) != 0 ? $k->joriy_bahos = round(array_sum($k->bahos) * 6 / count($k->bahos)) : $k->joriy_bahos = 0;
                count($k->mt_bahos) != 0 ? $k->mustaqil_bahos = round(array_sum($k->mt_bahos) * 2 / count($k->mt_bahos)) : $k->mustaqil_bahos = 0;
                count($k->oraliq_baho) != 0 ? $k->oraliq_bahos = round(array_sum($k->oraliq_baho) * 4 / count($k->oraliq_baho)) : $k->oraliq_bahos = 0;
                count($k->yakuniy_baho) != 0 ? $k->yakuniy_bahos = round(array_sum($k->yakuniy_baho) * 8 / count($k->yakuniy_baho)) : $k->yakuniy_bahos = 0;
                $k->total_bahos = $k->joriy_bahos + $k->mustaqil_bahos + $k->oraliq_bahos + $k->yakuniy_bahos;
                $k->total_mark = self::marked($k->total_bahos);
                switch ($k->total_mark) {
                    case 2 :
                        $two++;
                        break;
                    case 3 :
                        $three++;
                        break;
                    case 4 :
                        $four++;
                        break;
                    case 5 :
                        $five++;
                        break;
                }
            }
        } else if ($jurnal->yakuniy == false && $jurnal->oraliq == true) {
            foreach ($kursants as $k){
                $cnt = 0;
                $k->holat = true;
                foreach ($bahos_negativ_oraliq as $neg) {
                    if(!in_array($neg, $baho_qt)){
                        if($k->id == $neg['tinglovchi_id']){
                            $cnt++;
                        }
                    }
                }
                if($cnt>$count_oraliq_yakuniy){
                    $k->holat = false;
                }
            }
//        dd($kursants[0]->bahos);
            foreach ($kursants as $k) {
                count($k->bahos) != 0 ? $k->joriy_bahos = round(array_sum($k->bahos) * 8 / count($k->bahos)) : $k->joriy_bahos = 0;
                count($k->mt_bahos) != 0 ? $k->mustaqil_bahos = round(array_sum($k->mt_bahos) * 4 / count($k->mt_bahos)) : $k->mustaqil_bahos = 0;
                count($k->oraliq_baho) != 0 ? $k->oraliq_bahos = round(array_sum($k->oraliq_baho) * 8 / count($k->oraliq_baho)) : $k->oraliq_bahos = 0;

                $k->yakuniy_bahos = 0;
                if ($k->holat){
                    $k->total_bahos = $k->joriy_bahos + $k->mustaqil_bahos + $k->oraliq_bahos;
                    $k->joriy_bahos +=$k->mustaqil_bahos;
                }else{
                    $k->total_bahos = 0;
                }


                $k->total_mark = self::marked($k->total_bahos);
                switch ($k->total_mark) {
                    case 2 :
                        $two++;
                        break;
                    case 3 :
                        $three++;
                        break;
                    case 4 :
                        $four++;
                        break;
                    case 5 :
                        $five++;
                        break;
                }
            }
        } else {

            foreach ($kursants as $k) {
                $k->bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_joriy)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
                $k->mt_bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_mt)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
            }
            foreach ($kursants as $k) {
                count($k->bahos) != 0 ? $k->joriy_bahos = round(array_sum($k->bahos) * 12 / count($k->bahos)) : $k->joriy_bahos = 0;
                count($k->mt_bahos) != 0 ? $k->mustaqil_bahos = round(array_sum($k->mt_bahos) * 8 / count($k->mt_bahos)) : $k->mustaqil_bahos = 0;

                $k->oraliq_bahos = 0;
                $k->yakuniy_bahos = 0;
                if($k->holat){
                    $k->total_bahos = $k->joriy_bahos + $k->mustaqil_bahos;
                    $k->joriy_bahos+=$k->mustaqil_bahos;
                }else {
                    $k->total_bahos = 0;
                }
                $k->total_mark = self::marked($k->total_bahos);
                switch ($k->total_mark) {
                    case 2 :
                        $two++;
                        break;
                    case 3 :
                        $three++;
                        break;
                    case 4 :
                        $four++;
                        break;
                    case 5 :
                        $five++;
                        break;
                }
            }
        }
        return $data = ['kursants' => $kursants, 'two' => $two, 'three' => $three, 'four' => $four, 'five' => $five];


    }


    public static function marked($baho)
    {
        $res = 0;
        if ($baho < 56) {
            $res = 2;
        } else if ($baho < 71) {
            $res = 3;
        } else if ($baho < 86) {
            $res = 4;
        } else {
            $res = 5;
        }
        return $res;
    }


//        $baho_array = [1, 2, 3, 4, 5];
//        $jurnal = Jurnal::where('id', $jurnal_id)->first();
//        $guruh_id = $jurnal->guruh_id;
//        $kursants = Tinglovchi::where(['guruh_id' => $guruh_id, 'ohtm_id' => auth()->user()->ohtm_id])->get();
//        $dars_kuns_joriy = Dars_kun::select('id')->where(['jurnal_id' => $jurnal_id, 'ohtm_id' => auth()->user()->ohtm_id, 'nazorat_turi_id' => 3])->get()->toArray();
//        $dars_kuns_mt = Dars_kun::select('id')->where(['jurnal_id' => $jurnal_id, 'ohtm_id' => auth()->user()->ohtm_id, 'nazorat_turi_id' => 4])->get()->toArray();
//        $dars_kuns_yakuniy = Dars_kun::select('id')->where(['jurnal_id' => $jurnal_id, 'ohtm_id' => auth()->user()->ohtm_id, 'nazorat_turi_id' => 2])->get()->toArray();
//        $dars_kuns_oraliq = Dars_kun::select('id')->where(['jurnal_id' => $jurnal_id, 'ohtm_id' => auth()->user()->ohtm_id, 'nazorat_turi_id' => 1])->get()->toArray();
//
//
//        $kursants = Tinglovchi::where(['ohtm_id' => auth()->user()->ohtm_id, 'guruh_id' => $guruh_id])->get();
//        $modelName = 'App\Models\Baho' . auth()->user()->ohtm_id; // App\Models\Baho1
//        $model = new $modelName;
//        $five = 0;
//        $four = 0;
//        $three = 0;
//        $two = 0;
//        if ($jurnal->yakuniy == true && $jurnal->oraliq == true) {
//
//            foreach ($kursants as $k) {
//                $k->bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_joriy)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//                $k->mt_bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_mt)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//                $k->oraliq_baho = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_oraliq)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//                $k->yakuniy_baho = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_yakuniy)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//            }
//
////        dd($kursants[0]->bahos);
//            foreach ($kursants as $k) {
//                count($k->bahos) != 0 ? $k->joriy_bahos = round(array_sum($k->bahos) * 6 / count($k->bahos)) : $k->joriy_bahos = 0;
//                count($k->mt_bahos) != 0 ? $k->mustaqil_bahos = round(array_sum($k->mt_bahos) * 2 / count($k->mt_bahos)) : $k->mustaqil_bahos = 0;
//                count($k->oraliq_baho) != 0 ? $k->oraliq_bahos = round(array_sum($k->oraliq_baho) * 4 / count($k->oraliq_baho)) : $k->oraliq_bahos = 0;
//                count($k->yakuniy_baho) != 0 ? $k->yakuniy_bahos = round(array_sum($k->yakuniy_baho) * 8 / count($k->yakuniy_baho)) : $k->yakuniy_bahos = 0;
//                $k->total_bahos = $k->joriy_bahos + $k->mustaqil_bahos + $k->oraliq_bahos + $k->yakuniy_bahos;
//                $k->total_mark = self::marked($k->total_bahos);
//                switch ($k->total_mark) {
//                    case 2 :
//                        $two++;
//                        break;
//                    case 3 :
//                        $three++;
//                        break;
//                    case 4 :
//                        $four++;
//                        break;
//                    case 5 :
//                        $five++;
//                        break;
//                }
//            }
//        } else if ($jurnal->yakuniy == false && $jurnal->oraliq == true) {
//
//            foreach ($kursants as $k) {
//                $k->bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_joriy)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//                $k->mt_bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_mt)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//                $k->oraliq_baho = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_oraliq)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//            }
////        dd($kursants[0]->bahos);
//            foreach ($kursants as $k) {
//                count($k->bahos) != 0 ? $k->joriy_bahos = round(array_sum($k->bahos) * 8 / count($k->bahos)) : $k->joriy_bahos = 0;
//                count($k->mt_bahos) != 0 ? $k->mustaqil_bahos = round(array_sum($k->mt_bahos) * 4 / count($k->mt_bahos)) : $k->mustaqil_bahos = 0;
//                count($k->oraliq_baho) != 0 ? $k->oraliq_bahos = round(array_sum($k->oraliq_baho) * 8 / count($k->oraliq_baho)) : $k->oraliq_bahos = 0;
//
//                $k->yakuniy_bahos = 0;
//                $k->total_bahos = $k->joriy_bahos + $k->mustaqil_bahos + $k->oraliq_bahos;
//                $k->total_mark = self::marked($k->total_bahos);
//                switch ($k->total_mark) {
//                    case 2 :
//                        $two++;
//                        break;
//                    case 3 :
//                        $three++;
//                        break;
//                    case 4 :
//                        $four++;
//                        break;
//                    case 5 :
//                        $five++;
//                        break;
//                }
//            }
//        } else {
//
//            foreach ($kursants as $k) {
//                $k->bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_joriy)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//                $k->mt_bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_mt)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//            }
//            foreach ($kursants as $k) {
//                count($k->bahos) != 0 ? $k->joriy_bahos = round(array_sum($k->bahos) * 12 / count($k->bahos)) : $k->joriy_bahos = 0;
//                count($k->mt_bahos) != 0 ? $k->mustaqil_bahos = round(array_sum($k->mt_bahos) * 8 / count($k->mt_bahos)) : $k->mustaqil_bahos = 0;
//
//                $k->oraliq_baho = 0;
//                $k->yakuniy_baho = 0;
//                $k->total_bahos = $k->joriy_bahos + $k->mustaqil_bahos;
//                $k->total_mark = self::marked($k->total_bahos);
//                switch ($k->total_mark) {
//                    case 2 :
//                        $two++;
//                        break;
//                    case 3 :
//                        $three++;
//                        break;
//                    case 4 :
//                        $four++;
//                        break;
//                    case 5 :
//                        $five++;
//                        break;
//                }
//            }
//        }
//        return $data = ['kursants' => $kursants, 'two' => $two, 'three' => $three, 'four' => $four, 'five' => $five];
//
//
//    }
//
//
//    public static function marked($baho)
//    {
//        $res = 0;
//        if ($baho < 56) {
//            $res = 2;
//        } else if ($baho < 71) {
//            $res = 3;
//        } else if ($baho < 86) {
//            $res = 4;
//        } else {
//            $res = 5;
//        }
//        return $res;
//    }



    //        $baho_array = [3, 4, 5];
//        $jurnal = Jurnal::where('id', $jurnal_id)->first();
//        $guruh_id = $jurnal->guruh_id;
//        $kursants = Tinglovchi::where(['guruh_id' => $guruh_id, 'ohtm_id' => auth()->user()->ohtm_id])->get();
//        $dars_kuns_joriy = Dars_kun::select('id')->where(['jurnal_id' => $jurnal_id, 'ohtm_id' => auth()->user()->ohtm_id, 'nazorat_turi_id' => 3])->get()->toArray();
//        $dars_kuns_mt = Dars_kun::select('id')->where(['jurnal_id' => $jurnal_id, 'ohtm_id' => auth()->user()->ohtm_id, 'nazorat_turi_id' => 4])->get()->toArray();
//        $dars_kuns_yakuniy = Dars_kun::select('id')->where(['jurnal_id' => $jurnal_id, 'ohtm_id' => auth()->user()->ohtm_id, 'nazorat_turi_id' => 2])->get()->toArray();
//        $dars_kuns_oraliq = Dars_kun::select('id')->where(['jurnal_id' => $jurnal_id, 'ohtm_id' => auth()->user()->ohtm_id, 'nazorat_turi_id' => 1])->get()->toArray();
//        $dars_kuns_qt = Dars_kun::select('id')->where(['jurnal_id' => $jurnal_id, 'ohtm_id' => auth()->user()->ohtm_id, 'nazorat_turi_id' => 5])->get()->toArray();
//
//
//        $kursants = Tinglovchi::with(['baholar'=>function ($query) use  ($dars_kuns_joriy, $baho_array){
//            $query->whereIn('dars_kun_id', $dars_kuns_joriy)->whereNotIn('baho_id', $baho_array);
//        }, ])->where(['ohtm_id' => auth()->user()->ohtm_id, 'guruh_id' => $guruh_id])->get();
//        $modelName = 'App\Models\Baho' . auth()->user()->ohtm_id; // App\Models\Baho1
//        $model = new $modelName;
//        $five = 0;
//        $four = 0;
//        $three = 0;
//        $two = 0;
//
//        $array1 = [1,2,3,4,5,6];
//        $array2 = [6,4,5,3,1,2];
//
//
//
//
//
//
//
//
//        $bahos_negativ = $model::leftJoin('dars_kuns', 'dars_kun_id', '=', 'dars_kuns.id')
//            ->where(['dars_kuns.nazorat_turi_id'=> 3,'dars_kuns.ohtm_id'=>auth()->user()->ohtm_id])
//            ->whereIn('dars_kun_id', $dars_kuns_joriy)->whereNotIn('baho_id', $baho_array)
//            ->select('dars_kuns.mavzu_id as mavzu_id', 'tinglovchi_id', 'dars_kuns.jurnal_id as jurnal_id')->get();
//
//        $baho_qt = $model::leftJoin('dars_kuns', 'dars_kun_id', '=', 'dars_kuns.id')
//            ->where(['dars_kuns.nazorat_turi_id'=> 5 ,'dars_kuns.ohtm_id'=>auth()->user()->ohtm_id])
//            ->whereIn('baho_id', $baho_array)
//            ->select('dars_kuns.mavzu_id as mavzu_id', 'tinglovchi_id', 'dars_kuns.jurnal_id as jurnal_id')->get();
//
//
//        if ($jurnal->yakuniy == true && $jurnal->oraliq == true) {
//
//            if ($baho_array != $bahos_negativ && $bahos_negativ->mavzu_id == $baho_qt->mavzu_id) {
//            foreach ($kursants as $k) {
//
//                    $k->bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_joriy)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//                    $k->mt_bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_mt)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//                    $k->oraliq_baho = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_oraliq)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//                    $k->yakuniy_baho = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_yakuniy)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//                    $k->qt_baho = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_qt)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//
//
////        dd($kursants[0]->bahos);
//                foreach ($kursants as $k) {
//                    count($k->bahos) != 0 ? $k->joriy_bahos = array_sum($k->bahos) : $k->joriy_bahos = 0;
//                    count($k->mt_bahos) != 0 ? $k->mustaqil_bahos = array_sum($k->mt_bahos) : $k->mustaqil_bahos = 0;
//                    count($k->qt_baho) != 0 ? $k->qt_bahos = array_sum($k->qt_baho)  : $k->qt_bahos = 0;
//                    count($k->oraliq_baho) != 0 ? $k->oraliq_bahos = round(array_sum($k->oraliq_baho) / count($k->oraliq_baho)) : $k->oraliq_bahos = 0;
//                    count($k->yakuniy_baho) != 0 ? $k->yakuniy_bahos = round(array_sum($k->yakuniy_baho) / count($k->yakuniy_baho)) : $k->yakuniy_bahos = 0;
//                    $k->total_bahos = $k->joriy_bahos + $k->mustaqil_bahos + $k->oraliq_bahos + $k->yakuniy_bahos;
//                    $k->total_mark = self::marked($k->total_bahos);
//
//                    $k->total_joriy=round(($k->joriy_bahos + $k->mustaqil_bahos +$k->qt_bahos)/(count($k->bahos) + count($k->mt_bahos) + count($k->qt_baho)) );
//
//                    //                    dd($k->total_joriy);
//
//                    switch ($k->total_mark) {
//                        case 2 :
//                            $two++;
//                            break;
//                        case 3 :
//                            $three++;
//                            break;
//                        case 4 :
//                            $four++;
//                            break;
//                        case 5 :
//                            $five++;
//                            break;
//                    }
//                }
//            }
//            }
//        } else if ($jurnal->yakuniy == false && $jurnal->oraliq == true) {
//
//            foreach ($kursants as $k) {
//                $k->bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_joriy)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//                $k->mt_bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_mt)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//                $k->oraliq_baho = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_oraliq)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//            }
////        dd($kursants[0]->bahos);
//            foreach ($kursants as $k) {
//                count($k->bahos) != 0 ? $k->joriy_bahos = round(array_sum($k->bahos) * 8 / count($k->bahos)) : $k->joriy_bahos = 0;
//                count($k->mt_bahos) != 0 ? $k->mustaqil_bahos = round(array_sum($k->mt_bahos) * 4 / count($k->mt_bahos)) : $k->mustaqil_bahos = 0;
//                count($k->oraliq_baho) != 0 ? $k->oraliq_bahos = round(array_sum($k->oraliq_baho) * 8 / count($k->oraliq_baho)) : $k->oraliq_bahos = 0;
//
//                $k->yakuniy_bahos = 0;
//                $k->total_bahos = $k->joriy_bahos + $k->mustaqil_bahos + $k->oraliq_bahos;
//                $k->total_mark = self::marked($k->total_bahos);
//                switch ($k->total_mark) {
//                    case 2 :
//                        $two++;
//                        break;
//                    case 3 :
//                        $three++;
//                        break;
//                    case 4 :
//                        $four++;
//                        break;
//                    case 5 :
//                        $five++;
//                        break;
//                }
//            }
//        } else {
//
//            foreach ($kursants as $k) {
//                $k->bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_joriy)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//                $k->mt_bahos = $model::select('baho_id')->whereIn('dars_kun_id', $dars_kuns_mt)->whereIn('baho_id', $baho_array)->pluck('baho_id')->toArray();
//            }
//            foreach ($kursants as $k) {
//                count($k->bahos) != 0 ? $k->joriy_bahos = round(array_sum($k->bahos) * 12 / count($k->bahos)) : $k->joriy_bahos = 0;
//                count($k->mt_bahos) != 0 ? $k->mustaqil_bahos = round(array_sum($k->mt_bahos) * 8 / count($k->mt_bahos)) : $k->mustaqil_bahos = 0;
//
//                $k->oraliq_baho = 0;
//                $k->yakuniy_baho = 0;
//                $k->total_bahos = $k->joriy_bahos + $k->mustaqil_bahos;
//                $k->total_mark = self::marked($k->total_bahos);
//                switch ($k->total_mark) {
//                    case 2 :
//                        $two++;
//                        break;
//                    case 3 :
//                        $three++;
//                        break;
//                    case 4 :
//                        $four++;
//                        break;
//                    case 5 :
//                        $five++;
//                        break;
//                }
//            }
//        }
//        return $data = ['kursants' => $kursants, 'two' => $two, 'three' => $three, 'four' => $four, 'five' => $five];
//
//
//    }
//
//
//    public static function marked($baho)
//    {
//        $res = 0;
//        if ($baho < 56) {
//            $res = 2;
//        } else if ($baho < 71) {
//            $res = 3;
//        } else if ($baho < 86) {
//            $res = 4;
//        } else {
//            $res = 5;
//        }
//        return $res;
//    }

}
