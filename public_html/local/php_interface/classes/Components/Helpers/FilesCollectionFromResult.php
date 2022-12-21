<?php

namespace ZLabs\Components\Helpers;

use Illuminate\Support\Collection;
use ZLabs\ImageResizer\BxFile\File;

class FilesCollectionFromResult
{
    protected $ids;
    protected $file;

    public function __construct(Collection $ids, File $file = null)
    {
        $this->ids = $ids;
        $this->file = $file ?? new File;
    }

    public function obtain(): Collection
    {
        return \collect($this->file->getListByIds($this->ids->toArray()))
            ->map(function ($arFile) {
                $arFile['SRC'] = $this->prepareRealSrc($arFile);

                return $arFile;
            })
            ->keyBy('ID');
    }

    protected function prepareRealSrc(array $arImage)
    {
        return $arImage['SRC']
            ?: '/' . $this->file->getUploadDir() . '/' . $arImage['SUBDIR'] . '/' . $arImage['FILE_NAME'];
    }
}
