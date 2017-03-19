<?php

namespace App\Traits;

use DB;
use File;

trait FileableTrait
{
    /**
     * Boot events
     */
    public static function bootFileableTrait()
    {
        static::saved(function (self $model) {
            $model->saveFile();
        });

        static::deleted(function (self $model){
            $model->deleteFile();
        });
    }

    /**
     * Get File url path attribute
     *
     * @return string
     */
    public function getFileUrlAttribute()
    {
        return $this->fileUrl();
    }

    /**
     * Save Item File
     *
     * @return void
     * @throws \Symfony\Component\HttpFoundation\File\Exception\FileException
     * @throws \InvalidArgumentException
     */
    public function saveFile()
    {
        if (request()->hasFile('file'))
        {
            $fileName      = strtolower(class_basename($this)) . '-' . $this->id;
            $fileExtension = strtolower(request()->file('file')->getClientOriginalExtension());

            $file = request()->file('file')->move($this->filePath(), $fileName . "." . $fileExtension);
            $this->file = $file->getFilename();

            DB::table($this->getTable())
              ->where('id', $this->id)
              ->update(['file' => $this->file]);
        }
    }

    /**
     * Delete File
     *
     * @param bool $clearAttribute  Clear 'file' attribute
     * @return bool
     */
    public function deleteFile($clearAttribute = false)
    {
        File::delete($this->filePath() . DIRECTORY_SEPARATOR . $this->file);

        if ($clearAttribute){
            $this->clearFileAttribute();
        }

        return true;
    }

    /**
     * Clear image attribute
     *
     * @return mixed
     */
    public function clearFileAttribute()
    {
        $this->file = '';
        return $this->save();
    }

    /**
     * Get Image directory path
     *
     * @return string
     */
    public function filePath()
    {
        return storage_path('files') . DIRECTORY_SEPARATOR . $this->getTable();
    }

    /**
     * Get Image url path
     *
     * @return string
     */
    public function fileUrl()
    {
        return $this->getTable() . '/';
    }

}
