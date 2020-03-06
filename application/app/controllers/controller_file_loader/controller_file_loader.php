<?php
    function action_index(){

    }
    function action_get_specification(){
        $parse_file_name = explode('_', $_POST['file']);
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        if(file_exists(ROOTPUBLIC.'/pdf/orders/'.$_POST['file'].'.pdf')){
            header('Content-Disposition: attachment; filename=' . basename('спецификация_'.$_POST['file'].'.pdf'));
            if($_SESSION['user']['role_id'] == 2){

                if($_SESSION['user']['id'] == $parse_file_name[0]){
                    $response = ['error' => false, 'status' => 'success', 'data' => chunk_split(base64_encode(file_get_contents(ROOTPUBLIC.'/pdf/orders/'.$_POST['file'].'.pdf')))];
                }
                else{
                    $response = ['error' => true, 'status' => 'access denied'];
                }
            }
            else{

                $response = ['error' => false, 'status' => 'success', 'data' => chunk_split(base64_encode(file_get_contents('https://193.111.3.246:5001/MyWeb/LK/zakazi/'.$_POST['file'].'.pdf', false, stream_context_create($arrContextOptions))))];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'file exist error'];
        }
        echo json_encode($response) ;
    }

    function action_get_file(){
        echo json_encode(['error' => false, 'status' => 'success', 'data' => "https://193.111.3.246:5001/MyWeb/LK/zakazi/".$_POST['file']]);
    }