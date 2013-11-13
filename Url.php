<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Derek.mclean
 * Date: 13/11/13
 * Time: 14:40
 * To change this template use File | Settings | File Templates.
 */

class Del_Bitly_Url
{
    private $oauth_key = 'Your Key Here';
    private $login = 'Username';

    /**
     * @param $url
     * @param string $format
     * @return mixed
     */
    public function shorten($url,$format = 'txt')
    {
        $connectURL = 'http://api.bit.ly/v3/shorten?login='.$this->login.'&apiKey='.$this->oauth_key.'&uri='.urlencode($url).'&format='.$format;
        return $this->curlGetResult($connectURL);
    }

    /**
     * @param $user
     */
    public function setUserName($user)
    {
        $this->login = $user;
    }


    /**
     * @param $key
     */
    public function setOAuthKey($key)
    {
        $this->oauth_key = $key;
    }

    /**
     * @param $url
     * @return mixed
     */
    private function curlGetResult($url) {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}