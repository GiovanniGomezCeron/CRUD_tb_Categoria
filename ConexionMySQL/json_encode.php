<?php
Class Json_encode{
    public function encode($data){
	header("Content-type:application/json; charset=utf-8");
        $json=json_encode($data);
        echo $json;
    }
}

