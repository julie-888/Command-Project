<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyUser;

class MyUserController extends Controller
{
    public function create(Request $request){
        $user = new MyUser();
        $user->login = $request->input('login');
        $user->password = $request->input('password');
        $user->name= $request->input('name');
        $user->last_name= $request->input('last_name');

        $user->save();

        return $user;
    }

    public function list(){
        $user = MyUser::get();

        return $user;
    }

    public function update($id, Request $request)
    {
        if (!is_numeric($id))
        {
            throw new NotFoundException("Id пустой!");            
        }
        else
        {
            $user = MyUser::find($id);
            $user->login = $request->input('login');
            $user->password = $request->input('password');
            $user->name= $request->input('name');
            $user->name= $request->input('last_name');

            $user->save();
            
            return $user; 
        }           
    } 

    public function item($id){
        $user = MyUser::where('id', $id)->first();
        if(!empty($user) and isset($user)){
            return response()->json([$user], 200);
        }
        else{
            throw new NotFoundException();
        }
    }

    public function delete($id)
    {
        if (!is_numeric($id))
        {
            throw new NotFoundException("Id пустой!");            
        }
        else
        {
            $user = MyUser::where('id', $id)->first();
            if(!empty($user) and isset($user)){
                $user->delete(); 
                return response()->json([], 204);
            }
            else {
                throw new NotFoundException();                   
            }
        }                      
    } 
}
