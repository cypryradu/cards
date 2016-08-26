<?php

namespace Cards\Components;

abstract class Model
{
    protected $layout = DEFAULT_LAYOUT_FILE;

    public function getLayout()
    {
        return $this->layout;
    }

    public function setEmptyLayout()
    {
        return $this->layout = EMPTY_LAYOUT_FILE;
    }

    public function setLayout($layout)
    {
        return $this->layout = $layout;
    }
}
