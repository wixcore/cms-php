<?php

namespace WixCore\Template;

class Theme
{
    const RULES_NAME_FILE = [
        'header' => 'header-%s',
        'footer' => 'footer-%s',
        'sidebar' => 'sidebar-%s'
    ];

    public $url = '';
    protected $data = '';

    /**
     * @param $name
     * @return void
     * @throws \Exception
     */
    public function header($name = null)
    {
        $name = (string) $name;
        $file = 'header';

        if ($name !== '')
        {
            $file = sprintf(self::RULES_NAME_FILE['header'], $name);
        }

        $this->loadTemplateFile($file);
    }

    /**
     * @param $name
     * @return void
     * @throws \Exception
     */
    public function footer($name = '')
    {
        $name = (string) $name;
        $file = 'footer';

        if ($name !== '')
        {
            $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
        }

        $this->loadTemplateFile($file);
    }

    /**
     * @param $name
     * @return void
     * @throws \Exception
     */
    public function sidebar($name = '')
    {
        $name = (string) $name;
        $file = 'sidebar';

        if ($name !== '')
        {
            $file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }

        $this->loadTemplateFile($file);
    }

    /**
     * @param $name
     * @param $data
     * @return void
     * @throws \Exception
     */
    public function block($name = '', $data = [])
    {
        $name = (string) $name;

        if ($name !== '')
        {
            $this->loadTemplateFile($name, $data);
        }
    }

    /**
     * @param $nameFile
     * @param $data
     * @return void
     * @throws \Exception
     */
    private function loadTemplateFile($nameFile, $data = [])
    {
        $TemplateFile = ROOT_DIR . '/content/themes/default/example/' . $nameFile . '.php';

        if (is_file($TemplateFile))
        {
            extract($data);
            require_once $TemplateFile;
        }
        else
        {
            throw new \Exception(sprintf('View file %s does not exist!', $TemplateFile));
        }
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}