<?php

namespace App\Presenters;

use App\Traits\Presenter\BasePresenterTrait;

/**
 * Menu View Presenters
 */
class CommonPresenter
{
    use  BasePresenterTrait;

    /**
     * 格式化时间
     *
     * @param  int $unixTime
     *
     * @return string
     */
    public function showDateFormat($unixTime)
    {
        return date('Y-m-d H:i', $unixTime);
    }

    /**
     * 格式化版权归属
     *
     * @return string
     */
    public function showCopyright()
    {
        return ' <strong>Copyright © ' . date('Y') . ' <a href="https://github.com/luisedware" target="_blank">Build with Laravel by Luis Edware </a></strong> ';
    }
}
