<?php
/**
 * Created by PhpStorm.
 * User: sang
 * Date: 1/27/17
 * Time: 9:44 AM
 */

namespace App\Http\Controllers\HiddenLink;

use Session;

class FBRequest {
    private $__token;
    private $__baseUrl;
    private $__pageId;

    function __construct()
    {
        $this->__pageId = '404502496547851';
        $this->__token = Session::get('fb_user_access_token');
        $this->__baseurl = 'https://graph.facebook.com/v2.8/';
    }

    public function auto($url){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        $ch = curl_exec($curl);
        curl_close($curl);
        return $ch;
    }

    public function request($post_id, $type) {
        $url = $this->__baseurl . $this->__pageId. '_' . $post_id . '/' . $type . '?limit=500&' .'access_token=' . $this->__token;
        return \GuzzleHttp\json_decode($this->auto($url))->data;
    }

    public function getComments($post_id) {
        return $this->request($post_id, 'comments');
    }

    public function getReactions($post_id) {
        return $this->request($post_id, 'reactions');
    }
}