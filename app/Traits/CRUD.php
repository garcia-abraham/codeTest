<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\AllowedFilter;
use Notification;
use Exception;

trait CRUD
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $defaultSorts = ['created_at', 'id'];
        $sorts = isset($this->sorts) ? array_merge($defaultSorts, $this->sorts) : $defaultSorts;

        $defaultFilters = ['id'];
        $filters = isset($this->filters) ? $this->filters : $defaultFilters;

        $pagination = isset($this->pagination) ? $this->pagination : false;

        $query = QueryBuilder::for($this->model)
        ->allowedSorts($sorts)
        ->allowedFilters($filters);

        return $pagination ? $query->simplePaginate(15) : $query->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $model_name = $this->getModelName();        

        try {
            DB::beginTransaction();
            $model = $this->model::create($request->all());
            DB::commit();
            $this->handleNotifications($model);
            return response()->json([
                'data' => $model,
                'message' => trans('messages.'.$model_name.'.create.success')
            ], 200);
        } catch (Exception $e) {
            dd($e);
            DB::rollback();
            return response()->json(["errors" => [trans('messages.'.$model_name.'.create.fail')]], 412);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->model::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model_name = $this->getModelName();

        try {
            DB::beginTransaction();
            $model = $this->model::findOrFail($id);
            $model->update($this->getInput($request));
            $this->handleNotifications($model);
            DB::commit();
            return response()->json([
                'message' => trans('messages.'.$model_name.'.update.success')
            ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(["errors" => [trans('messages.'.$model_name.'.update.fail')]], 412);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model_name = $this->getModelName();
        
        try {
            DB::beginTransaction();
            $model = $this->model::findOrFail($id);
            $model->delete();
            DB::commit();
            return response()->json([
                'message' => trans('messages.'.$model_name.'.destroy.success')
            ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(["errors" => [trans('messages.'.$model_name.'.destroy.fail')]], 412);
        }
    }

    protected function handleNotifications($model)
    {
        if(isset($this->notifications)){
            $notifications = $this->notifications;

            foreach($notifications as $notification) {
                $recipients = array_key_exists('recipients', $notification) ? $notification['recipients'] : $model;
                Notification::send($recipients, new $notification['notification']($model));
            }
        }
    }

    protected function getInput($request)
    {
        return array_filter($request->all(), function($value) {
            return ($value !== null && $value !== ''); 
        });
    }

    protected function camelToSnake($input)
    {
        if (preg_match('/[A-Z]/', $input ) === 0){ 
            return $input; 
        }
        $pattern = '/([a-z])([A-Z])/';
        $r = strtolower ( preg_replace_callback ($pattern, function($a){
            return $a[1]."_".strtolower($a[2]); 
        }, $input));
        return $r;
    }

    protected function getModelName(){
        return $model_name = $this->camelToSnake(class_basename($this->model));
    }
}