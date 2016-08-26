<?php

namespace Cards\Components;

abstract class Widget extends View
{
    public function __toString()
    {
        $this->layout = null;

        return $this->output();
    }
}
