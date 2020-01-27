<?php
    function get_downloads($dir) {

        $result = array();

        $cdir = scandir($dir);
        foreach ($cdir as $key => $value)
        {
            if (!in_array($value,array(".","..")))
            {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
                {
                    $tree = get_downloads($dir . DIRECTORY_SEPARATOR . $value);
                    $path = $dir.DIRECTORY_SEPARATOR.$value;
                    $result[$path] = $tree;
                }
                else
                {
                    $path = $dir.DIRECTORY_SEPARATOR.$value;
                    $result[] = $path;
                }
            }
        }

        return $result;
    }