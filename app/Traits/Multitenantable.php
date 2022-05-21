<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\User;
use App\Models\Region;
use App\Models\District;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;


trait Multitenantable {
    public static function bootMultitenantable(){

        if (auth()->check()) {
            static::creating(function($model){
                $model->user_id = auth()->id();
                $model->status = 'saved';
                
                $dfo = District::where('id', $model->district_id)->first();
                $fo = Region::where('id', $dfo->region_id)->first();

                $model->dfo_id = $dfo->dfo_id;
                $model->fo_id = $fo->fo_id;
                // $model->kppm_id = $fo->fo_id;
                // dd($fo); 
            });




            // $role = DB::table('role_user')
            //             ->where('user_id', auth()->id())
            //             ->first();

            // if ($role->role_id == 3) {
            //     static::addGlobalScope('dfo_id', function($builder) {
            //         if (auth()->check()) {
            //             return $builder->where('dfo_id', auth()->id());
            //         }
            //     });
            // } elseif ($role->role_id == 4) {
            //     static::addGlobalScope('kppm_id', function($builder) {
            //         if (auth()->check()) {
            //             return $builder->where('kppm_id', auth()->id());
            //         }
            //     });
            // } else {
            //     static::addGlobalScope('created_by_user_id', function($builder) {
            //         if (auth()->check()) {
            //             return $builder->where('created_by_user_id', auth()->id());
            //         }
            //     });
            // }

            $roleTitle = auth()->user()->roles()->first()->title;
            if ($roleTitle != 'Viewer' && $roleTitle != 'Admin') {
                // if ($roleTitle == 'DFO') {
                //     static::addGlobalScope('dfo_id', function($builder) {
                //         if (auth()->check()) {
                //             return $builder->where('dfo_id', auth()->id());
                //         }
                //     });
                if ($roleTitle == 'DFO') {
                    static::addGlobalScope('district_id', function($builder) {
                        if (auth()->check()) {
                            $districtId = District::where('dfo_id', auth()->id())->firstOrFail()->id;
                            return $builder->where('district_id', $districtId);
                        }
                    });
                } elseif ($roleTitle == 'ADFO') {
                    static::addGlobalScope('district_id', function($builder) {
                        if (auth()->check()) {
                            $districtId = District::where('adfo_id', auth()->id())->firstOrFail()->id;
                            return $builder->where('district_id', $districtId);
                        }
                    });
                } elseif ($roleTitle == 'PPW') {
                    static::addGlobalScope('region_id', function($builder) {
                        if (auth()->check()) {
                            $regionId = Region::where('ppw_id', auth()->id())->firstOrFail()->id;
                            $districtIds = District::select('id')->where('region_id', $regionId)->get()->toArray();
                            return $builder->whereIn('district_id', $districtIds);
                        }
                    });
                } elseif ($roleTitle == 'TPPW') {
                    static::addGlobalScope('region_id', function($builder) {
                        if (auth()->check()) {
                            $regionId = Region::where('tppw_id', auth()->id())->firstOrFail()->id;
                            $districtIds = District::select('id')->where('region_id', $regionId)->get()->toArray();
                            return $builder->whereIn('district_id', $districtIds);
                        }
                    });
                } elseif ($roleTitle == 'FO') {
                    static::addGlobalScope('region_id', function($builder) {
                        if (auth()->check()) {
                            $regionId = Region::where('fo_id', auth()->id())->firstOrFail()->id;
                            $districtIds = District::select('id')->where('region_id', $regionId)->get()->toArray();
                            return $builder->whereIn('district_id', $districtIds);
                        }
                    });
                // } elseif ($roleTitle == 'FO') {
                //     static::addGlobalScope('fo_id', function($builder) {
                //         if (auth()->check()) {
                //             return $builder->where('fo_id', auth()->id());
                //         }
                //     });
                } elseif ($roleTitle == 'KPPM') {
                    static::addGlobalScope('kppm_id', function($builder) {
                        if (auth()->check()) {
                            return $builder->where('kppm_id', auth()->id());
                        }
                    });
                } else {
                    static::addGlobalScope('user_id', function($builder) {
                        if (auth()->check()) {
                            return $builder->where('user_id', auth()->id());
                        }
                    });
                }
            }

        }
    }
}