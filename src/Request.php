<?php

namespace OAuth2\Zf2Bridge;

use Zend\Http\PhpEnvironment\Request as BaseRequest;
use OAuth2\RequestInterface;

/**
*
*/
 class Request extends BaseRequest implements RequestInterface
 {
    public function query($name, $default = null)
    {
        return $this->getQuery($name, $default);
    }

    public function request($name, $default = null)
    {
        return $this->getPost($name, $default);
    }

    public function server($name, $default = null)
    {
        return $this->getServer($name, $default)->toString();
    }

    public function headers($name, $default = null)
    {
        $header = $this->getHeaders($name, $default);
        if(!$header)
        {
            return $default;
        }
        return $header->toString();
    }

    public function getAllQueryParameters()
    {
        return $this->getQuery()->toArray();
    }

    public static function createFromRequest(BaseRequest $request)
    {
        return new static($request->getQuery(), $request->getPost(), array(), $request->getCookie(), $request->getFiles(), $request->getServer(), $request->getContent());
    }
 }
