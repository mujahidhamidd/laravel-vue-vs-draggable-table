<?php

namespace App\Http\Controllers;
use App\Area;

use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function home()
    {
        $areas = Area::with('services')->orderBy('order')->get();

       
        return view('index')->with([
            'areas' => $areas,
           
        ]);
    }

   

     
 
    public function updateAll(Request $request)
    {
        

        $areas = Area::all();

        foreach ($areas as $area) {
            $area->timestamps = false;
            $id = $area->id;
            foreach ($request->areas as $areasfromvue) {
                if ($areasfromvue['id'] == $id) {
                    $area->update(['order' => $areasfromvue['order']]);
                }
            }
        }

        return response('Update Successful.', 200);
    }
}
