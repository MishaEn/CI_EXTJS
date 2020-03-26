<?php
    function action_index(){
        submodule_loader('downloads', 'downloads');
    }

    function action_get_file_list(){
        $conn = connect_ftp();
        $folder = $_POST['path'];
        if(!$conn['error']){
            $item_list = ['error' => false, 'status' => 'success', 'data' =>  listDetailed($conn['connection'], $folder)];
        }
        else{
            $item_list = ['error' => true, 'status' => 'file getting fail'];
            close_ftp($conn['connection']);
        }
        if($_POST['path'] == '/LK/zakazi/'){
            foreach ($item_list['data'] as $key => $item){
                if(in_array($_SESSION['user']['id'], explode('/', $key))){
                    $response['data'][$key] = $item;

                }
            }
            $response['data']['path'] = '/LK/zakazi';
            element_loader('folder_row', 'downloads', $response);
        }
        else{
            $item_list['data']['path'] = $_POST['path'];
            element_loader('folder_row', 'downloads', $item_list);
        }
        close_ftp($conn['connection']);
    }

    function action_download_file(){
        $conn = connect_ftp();
        $file_path = $_POST['path'];
        $explode_path = explode('/', $file_path);
        $file_name = $explode_path[count($explode_path) - 1];
        header('Content-Type: application/octet-stream');
        if (ftp_get($conn['connection'], 'C:\Users\Public\Downloads'.$file_name, $file_path, FTP_ASCII)) {
            echo "File has been downloaded!!";
            close_ftp($conn['connection']);
            return true;

        } else {
            close_ftp($conn['connection']);
            echo "fail ... ";
            echo "Connected has be stopped!!";
            return false;
        }

    }
    function action_get_archive(){
        $con =  connect_ftp();
        $date = date('Y-d-m H:i:s');
        $file = $_POST['file_list'];
        $explode_file = explode('/', $file);
        $local = ROOTPUBLIC.'/file/temp/';
        $name = $_SESSION['user']['id'].'-'.$date.'.zip';
        $zip = new ZipArchive();
        $zip_name = $local.$name;
        if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE){}
        foreach($explode_file as $item){
            $get = ftp_get($con['connection'], $local.$item, $_POST['folder'].'/'.$item,  FTP_BINARY);
            $zip->addFile($local.$item, $item);
            //unlink($local.$item);
        }
        $zip->close();
        foreach($explode_file as $item){
            unlink($local.$item);
        }
        header("Content-Disposition: attachment; filename=archive.zip");
        header("Content-type: application/octet-stream");
        echo file_get_contents($zip_name);
    }
    function action_get_file_size(){

    }
    function action_get_file(){
        $con =  connect_ftp();
        $local = ROOTPUBLIC.'/file/temp/';
        $explode_path = explode('/', $_POST['path']);
        $get = ftp_get($con['connection'], $local.$explode_path[count($explode_path) - 1], $_POST['path'],  FTP_BINARY);
        header("Content-Disposition: attachment; filename=archive.zip");
        header("Content-type: application/octet-stream");
        echo '1';
        echo file_get_contents($local.$explode_path[count($explode_path) - 1]);
    }
