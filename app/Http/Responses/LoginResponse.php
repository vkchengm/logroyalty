<?php
 
namespace App\Http\Responses;
 
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
 
class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        // dd($request);
        // $title = auth()->user()->roles()->first()->title;
        // dd($title);

        // dd(auth()->user()->roles()->first()->title);
        
        // if ($title) {
        //     if ($title =='Admin'){
        //         $home = '/users';
        //     } else 
        //     {
        //         $home = '/tdps';
        //     };
        // } else {
            $home = '/welcome';
        // }


        // try{  

        //     $title = auth()->user()->roles()->first()->title;

        //     if ($title =='Admin'){
        //         $home = '/users';
        //     } else 
        //     {
        //         $home = '/tdps';
        //     };
        
        // }catch(Exception $e){
            // $home = '/dashboard';

        //     // echo 'failed';
        // }




        // if ($title =='Admin'){
        //     $home = '/users';
        // } else 
        // {
        //     $home = '/tdps';
        // };


        // dd($home);

        //$home = auth()->user()->is_admin ? '/admin' : '/dashboard';
        // return redirect()->intended($home);

        // $home = auth()->user()->is_admin ? '/users' : '/permits';

        return redirect()->intended($home);
    }
}