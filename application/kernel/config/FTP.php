<?php
    function connect_ftp(){
        $host = '193.111.3.246';
        $port = '21';
        $login = 'eCAD';
        $password = '3cadevolution';
        $timeout = 90;

        $conn = ftp_connect($host, $port, $timeout);
        if(ftp_login($conn, $login, $password)){
            ftp_pasv($conn, true);
            $response =  ['error' => false, 'status' => 'success', 'connection' => $conn];
        }
        else{
           $response =  ['error' => true, 'status' => 'auth fail'];
        }
        return $response;
    }
    function close_ftp($conn){
        if(ftp_close($conn)){
            $response = ['error' => false, 'status' => 'connect close'];
        }
        else{
            $response = ['error' => true, 'status' => 'connect close with fail'];
        }
        return $response;
    }

    function get_file_list($conn, $folder){
        return ftp_rawlist($conn, $folder);
    }
    function listDetailed($resource, $directory = '.') {
        if (is_array($children = @ftp_rawlist($resource, $directory))) {
            $items = array();

            foreach ($children as $child) {
                $chunks = preg_split("/\s+/", $child);
                list($item['rights'], $item['number'], $item['user'], $item['group'], $item['size'], $item['month'], $item['day'], $item['time']) = $chunks;
                $item['type'] = $chunks[0]{0} === 'd' ? 'directory' : 'file';
                array_splice($chunks, 0, 8);
                $items[implode(" ", $chunks)] = $item;
            }


            return $items;
        }

        // Throw exception or return false < up to you
    }