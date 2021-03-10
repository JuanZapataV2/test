<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use App\Exceptions\InvalidInputException;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::orderBy('brand', 'asc')->get();
        return response()->json(['data' => $cars], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        try{
            $car = Car::create($request->all());
            $request::validateBrand($request->brand);
            $request::validateModel($request->model);
        } catch(\Exception $e){
            return response (['code'=>'400','title'=>'Algo ha ocurrido mal :(','message'=>$e->getMessage()], 422);
        }
        
        return response()->json(['data' => $car], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        try{
            $car = Car::where('id',$car->id);
            if(is_null($car)){
                throw new NotFoundHttpException();
            }else{
                return response()->json(['data' => $car], 200);  
            }
            
        } catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 404);  
        }
        return response()->json(['data' => $car], 200); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, Car $car)
    {
        $car->update($request->all());
        return response()->json(['data' => $car], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return response(null, 204);

    }
}
