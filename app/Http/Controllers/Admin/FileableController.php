<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;

class FileableController extends BackendController
{
    /**
     * Download File
     *
     * @param File $id
     * @return Response
     */
    public function download($id)
    {
        $file = File::findOrFail($id);

        return response()->download($file->filePath() . DIRECTORY_SEPARATOR . $file->file, $file->name . substr($file->file, strrpos($file->file, '.')));
    }

    /**
     * Delete File
     *
     * @param Request $request
     * @return Response
     */
    public function delete(Request $request)
    {
        $className = $request->get('model_class');
        $modelId   = $request->get('model_id');

        $model = new $className();

        $item = $model->findOrFail($modelId);
        $item->deleteFile(true);

        if($request->ajax()) {
            return response()->json([
                'status'  => 'ok',
                'message' => 'Фотография удалена',
            ]);
        }

        return redirect($request->session()->previousUrl());
    }
}
