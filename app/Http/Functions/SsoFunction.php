<?php namespace App\Http\Functions;

class SsoFunction extends ApimdsFunction
{
    public function validate($user = '', $token = '')
    {
        $url = $this->urlBase . '/sso/users/' . str_slug($user) . '/sessions?stoken=' . $token;
        
        $this->call($url);
    }

    public function checkSession($sessionId = '')
    {
        $url = $this->urlBase . '/sso/sessions/' . $sessionId;
        $this->call($url);
    }

    public function searchByUsername($username)
    {
        $url = $this->urlBase . '/sso/users/' . str_slug($username);
        $this->call($url);
    }

    public function search($search = '', $areas = [], $offset = 0)
    {
        $url = $this->urlBase . '/sso/users?search=' . $search . '&areas=' . implode(',', $areas) . '&offset=' . $offset;
        $this->call($url);
    }


}