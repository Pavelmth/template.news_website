<?php

class View
{
    const PathView = '/../views/';

    protected $data=[];

    public function assing($items)
    {
        $this->data = $items;
    }

    public function render($template)
    {
        ob_start();
        include __DIR__ . self::PathView . $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template) {

        echo $this->render($template);
    }
}
