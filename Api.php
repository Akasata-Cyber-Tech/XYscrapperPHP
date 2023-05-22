<?php
require __DIR__ . '/vendor/autoload.php';

class Api {

public function google(){
    if(isset($_POST['submit'])){
        $query = [
            "location" => "Indonesia",
            "hl" => "id",
            "gl" => "id",
            "google_domain" => "google.co.id",
            "q" => $_POST['cari'],
           ];
           
           $search = new GoogleSearchResults('1ccc41b9b19ce9c9ac8dd52252df4192c6f75b6d2160534e258d0229802b1dd6');
           $result = $search->get_json($query);
           $organic_results = $result->organic_results;
            foreach($organic_results as $key => $val){
                $myfile = fopen("data.txt", "a");
                $txt = $val->link . "\r\n";
                fwrite($myfile, $txt);
           }
           return $organic_results;
    }
    
}

    // public function recipes_results(){
    //     if(isset($_POST['submit'])){
    //         $query = [
    //             "location" => "Indonesia",
    //             "hl" => "id",
    //             "gl" => "id",
    //             "google_domain" => "google.co.id",
    //             "q" => $_POST['cari'],
    //            ];
               
    //            $search = new GoogleSearchResults('1ccc41b9b19ce9c9ac8dd52252df4192c6f75b6d2160534e258d0229802b1dd6');
    //            $result = $search->get_json($query);
    //            $recipes_results = $result->recipes_results;
    //             foreach($recipes_results as $key => $val){
    //                 $myfile = fopen("data.txt", "a");
    //                 $txt = $val->link . "\r\n";
    //                 fwrite($myfile, $txt);
    //            }
    //            return $recipes_results;
    //     }
    // }

    public function proses(){
        $api = new Api;
        return $api->google();
        // return $api->recipes_results();
    }

}
?>