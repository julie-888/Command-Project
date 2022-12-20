<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesMediaController extends Controller
{
    public function create(Request $request){
        $media = new Favorites_Media();
        $media->login = $request->input('name');
        $media->password = $request->input('user_id');
        
        $media->save();

        return $media;
    }

    public function list(){
        $media = new Favorites_Media::get();

        return $media;
    }

    public function update($id, Request $request)
    {
        if (!is_numeric($id))
        {
            throw new NotFoundException("Id пустой!");            
        }
        else
        {
            $media = new Favorites_Media::find($id);
            $media->login = $request->input('name');
            $media->password = $request->input('user_id');
            $media->save();
            
            return $media; 
        }           
    } 

    public function item($id){
        $media = Favorites_Media::where('id', $id)->first();
        if(!empty($media) and isset($media)){
            return response()->json([$media], 200);
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
            $media = Favorites_Media::where('id', $id)->first();
            if(!empty($media) and isset($media)){
                $media->delete(); 
                return response()->json([], 204);
            }
            else {
                throw new NotFoundException();                   
            }
        }                      
    } 
}
