<?php

/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 09.04.2015
 * Time: 12:22
 */
namespace Admin {
    use Exception;

    class BaseView
    {
        protected $file;
        protected $data = array();

        public function __construct($fileName)
        {
            $this->file = $fileName;
        }

        public function set($key, $value)
        {
            $this->data[$key] = $value;
        }

        public function get($key)
        {
            return $this->data[$key];
        }

        public function output($contentView, $templateView)
        {
            if (!file_exists($this->file)) {
                throw new Exception("Model file " . $this->file . " doesn't exist.");
            }
            extract($this->data);
            ob_start();

            #include($this->file);

            $output = ob_get_contents();
            ob_end_clean();

            include ADMIN_PATH . $templateView;

            return $output;
        }
    }
}
