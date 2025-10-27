<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Session\Handlers\FileHandler;

class App extends BaseConfig
{
    public string $baseURL = '';
    public array $allowedHostnames = [];
    public string $indexPage = '';
    public string $uriProtocol = 'REQUEST_URI';
    public string $defaultLocale = 'es';
    public bool $negotiateLocale = true;
    public array $supportedLocales = ['en', 'es'];
    public string $appTimezone = 'UTC';
    public string $charset = 'UTF-8';
    public bool $forceGlobalSecureRequests = false;
    public string $sessionDriver = FileHandler::class;
    public string $sessionCookieName = 'ci_session';
    public int $sessionExpiration = 86400;
    public string $sessionSavePath = WRITEPATH . 'session';
    public bool $sessionMatchIP = false;
    public int $sessionTimeToUpdate = 300;
    public bool $sessionRegenerateDestroy = false;
    public ?string $sessionDBGroup = null;
    public string $cookiePrefix = '';
    public string $cookieDomain = '';
    public string $cookiePath = '/';
    public bool $cookieSecure = false;
    public bool $cookieHTTPOnly = true;
    public ?string $cookieSameSite = 'Lax';
    public array $proxyIPs = [];
    public string $CSRFTokenName = 'csrf_test_name';
    public string $CSRFHeaderName = 'X-CSRF-TOKEN';
    public string $CSRFCookieName = 'csrf_cookie_name';
    public int $CSRFExpire = 7200;
    public bool $CSRFRegenerate = true;
    public bool $CSRFRedirect = false;
    public string $CSRFSameSite = 'Lax';
    public bool $CSPEnabled = false;
	public function __construct()
    {
        $isHttps = ($_SERVER['HTTPS'] ?? '') === 'on' 
                 || ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https'
                 || ($_SERVER['REQUEST_SCHEME'] ?? '') === 'https';
        
        $this->baseURL = ($isHttps ? 'https' : 'http') 
            . '://' . $_SERVER['HTTP_HOST'] . '/debisoft/';
    }
}
