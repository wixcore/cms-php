<?php

namespace WixCore\Template;

class View
{
    public function __construct()
    {

    }

    /**
     * @param $template
     * @param array $vars
     * @return void
     */

    public function render($template, array $vars = [])
    {
        $templatePath = ROOT_DIR . '/content/themes/default/' . $template . '.php';
        if (!is_file($templatePath))
        {
            throw new \InvalidArgumentException(sprintf('Template <hr>"%s" not found in <hr>"%s"', $template, $templatePath));
        }
        extract($vars);
        ob_start();
        ob_implicit_flush(0);

        try
        {
            require $templatePath;
        }
        catch (\Exception $e)
        {
            ob_end_clean();
            throw $e;
        }
        echo ob_get_clean();
    }
}