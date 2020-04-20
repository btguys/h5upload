<?php

namespace Encore\h5upload;

use Encore\Admin\Form\Field;

class h5uploadFiled extends Field
{
    public $view = 'h5upload::index';

    function render()
    {
        //判断是否有值,有值那么就是编辑,编辑不需要强制上传
        if (!is_null($this->value)) {
            unset($this->attributes['required']);
        }
        return parent::render(); // TODO: Change the autogenerated stub
    }

    /**
     * 设置允许文件上传扩展
     * @param string $type 允许上传类型:{video->允许上传视频,file->允许上传所有文件,mp3->允许上传音频文件,image->允许上传照片}
     */
    function setExpansion(string $type = 'file')
    {
        $accept = '*';
        switch ($type) {
            case 'video':
                $accept = 'audio/mp4,video/mp4';
                break;
            case 'mp3':
                $accept = 'audio/mpeg';
                break;
            case 'image':
                $accept = 'image/jpeg,image/png,image/gif';
                break;
        }
        $this->attribute('accept', $accept);
        return $this;
    }

}
