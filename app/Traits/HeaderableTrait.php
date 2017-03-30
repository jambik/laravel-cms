<?php

namespace App\Traits;

use File;

trait HeaderableTrait
{
    /**
     * Boot events
     */
    public static function bootHeaderableTrait()
    {
        static::saved(function (self $model) {
            $model->saveHeader();
        });

        static::deleted(function (self $model){
            $model->deleteHeader();
        });
    }

    /**
     * Header relation
     *
     * @return mixed
     */
    public function header()
    {
        return $this->morphOne('App\Header', 'headerable');
    }

    /**
     * Save header
     * @return mixed
     */
    public function saveHeader()
    {
        if (request()->exists('header')) {

            $data = request()->get('header');

            if (request()->hasFile('header')) {
                $imageExtension = strtolower(request()->file('header')['image']->getClientOriginalExtension());
                $headerFile = request()->file('header')['image']->move($this->headerPath(), 'header-' . uniqid() . '.' . $imageExtension);
                $data = array_merge($data, ['image' => $headerFile->getFilename()]);
            }

            if ( ! collect($data)->implode('')) {
                return;
            }


            if ($this->header) {
                return $this->header()->update($data);
            }

            return $this->header()->create($data);
        }
    }

    /**
     * Delete header
     */
    public function deleteHeader()
    {
        $this->deleteHeaderFile();
        $this->deleteHeaderModel();
    }

    /**
     * Delete header file
     * @return bool
     */
    public function deleteHeaderFile($clearAttribute = false)
    {
        if ($this->header && $this->header->image) {
            File::delete($this->headerPath() . DIRECTORY_SEPARATOR . $this->header->image);
        }

        if ($clearAttribute){
            $this->clearHeaderImageAttribute();
        }

        return true;
    }

    /**
     * Delete header model
     * @return bool|null
     */
    public function deleteHeaderModel()
    {
        return $this->header()->delete();
    }

    /**
     * Clear header image attribute
     *
     * @return mixed
     */
    public function clearHeaderImageAttribute()
    {
        $this->header->image = '';
        return $this->header->save();
    }

    /**
     * Get header directory path
     *
     * @return string
     */
    public function headerPath()
    {
        return storage_path('images') . DIRECTORY_SEPARATOR . 'headers';
    }

    /**
     * Get header url path
     *
     * @return string
     */
    public function headerUrl()
    {
        return 'headers/';
    }

}
