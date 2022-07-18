<?php

namespace App\Http\Controllers;
use \Symfony\Component\HttpFoundation\Response;

use App\Http\Requests\ContentsRequest;
use App\Models\contents;

class ContentsController extends Controller
{
    /**
     * コンテンツの一覧を表示
     * @return contents[] | \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return contents::where('delete_flag', '=', false)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * コンテンツの新規登録
     *
     * @param  \App\Http\Requests\StorecontentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentsRequest $request)
    {
        $result = contents::insert($request->all());

        if ($result) {
            $res = [
                'result' => 'success'
            ];
            $http_status = Response::HTTP_CREATED;
        } else {
            $res = [
                'result' => 'failure',
                'error_msg' => 'error'
            ];
            $http_status = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return response()->json($res, $http_status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contents  $contents
     * @return \Illuminate\Http\Response
     */
    public function show(contents $contents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contents  $contents
     * @return \Illuminate\Http\Response
     */
    public function edit(contents $contents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecontentsRequest  $request
     * @param  \App\Models\contents  $contents
     * @return \Illuminate\Http\Response
     */
    public function update(ContentsRequest $request, $id)
    {
        // 更新対象のデータを検索
        $target = contents::where('id', '=', $id)->first();

        $result = $target->fill($request->all())->update();

        if ($result > 0) {
            $res = [
                'result' => 'success'
            ];
            $http_status = Response::HTTP_OK;
        } else {
            $res = [
                'result' => 'failure',
                'error_msg' => 'error'
            ];
            $http_status = Response::HTTP_INTERNAL_SERVER_ERROR;
        }
        
        return response()->json($res, $http_status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contents  $contents
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 更新対象のデータを検索
        $target = contents::where('id', '=', $id)->first();

        $result = $target->update([
            'delete_flag' => true
        ]);

        if ($result > 0) {
            $res = [
                'result' => 'success'
            ];
            $http_status = Response::HTTP_OK;
        } else {
            $res = [
                'result' => 'failure',
                'error_msg' => 'error'
            ];
            $http_status = Response::HTTP_INTERNAL_SERVER_ERROR;
        }
        
        return response()->json($res, $http_status);
    }
}
