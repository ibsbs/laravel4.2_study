<?php
namespace Demo;

class CurlDemoController extends \BaseController
{
    public function getTestOne()
    {
        //初始化变量
        $cookie_file = 'cookiefile';   #cookie地址
        $login_url = 'https://account.xiaomi.com/pass/serviceLoginAuth2'; #小米登陆
        //$login_url = 'http://cd.iduoqian.com/333vgohappy/?c=user&a=login'; #小米登陆
        $verify_code_url = ''; #验证码url
        $timeout = 1;
        date_default_timezone_set('PRC');   #设置时区 和cookie有关的工作要设置时区

        //模拟登陆 
        //初始化curl
        //$userData = 'user=18581877799&_json=true&pwd=YAB4894286&callback=http://order.mi.com/login/callback?followup=http%3A%2F%2Fwww.mi.com&sign=MjMyMGJhNjNmZmM2NTc0YWM4NzdkN2IzMjNlZjhmMzhhODAxMDZiNg,,&sid=mi_eshop&qs=%3Fcallback%3Dhttp%253A%252F%252Forder.mi.com%252Flogin%252Fcallback%253Ffollowup%253Dhttp%25253A%25252F%25252Fwww.mi.com%2526sign%253DMjMyMGJhNjNmZmM2NTc0YWM4NzdkN2IzMjNlZjhmMzhhODAxMDZiNg%252C%252C%26sid%3Dmi_eshop&hidden=&_sign=6f/KJ3piD5EyDCFo/PvvBBLTXxI=&serviceParam={"checkSafePhone":false}&auto=true';
        $userData = 'user=18581877799&pwd=YAB4894286&auto=true';
        //$userData = 'username=admin&password=shuaige888';
        $userData = urlencode($userData);
        $curlLogin = curl_init();
        
        curl_setopt($curlLogin, CURLOPT_URL, $login_url);               #设置访问的URL
        curl_setopt($curlLogin, CURLOPT_RETURNTRANSFER, true);          #执行之后不直接打印，而是用一个变量接收
        curl_setopt($curlLogin, CURLOPT_CONNECTTIMEOUT, $timeout);      #发起连接前的等待时间

        curl_setopt($curlLogin, CURLOPT_COOKIESESSION, TRUE); 
        curl_setopt($curlLogin, CURLOPT_COOKIEJAR, $cookie_file);
        curl_setopt($curlLogin, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($curlLogin, CURLOPT_COOKIE, session_name() . '=' . session_id());

        curl_setopt($curlLogin, CURLOPT_HEADER, false);                 #不把头文件信息作为数据流输出
        curl_setopt($curlLogin, CURLOPT_FOLLOWLOCATION, true);          #允许跳转

        curl_setopt($curlLogin, CURLOPT_SSL_VERIFYPEER, false);         #不进行服务端验证
        curl_setopt($curlLogin, CURLOPT_SSL_VERIFYHOST, false);             #检查公用名是否存在，是否与主机名匹配
        curl_setopt($curlLogin, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);   #模拟用户浏览器

        curl_setopt($curlLogin, CURLOPT_POST, true);                    #发送post请求
        curl_setopt($curlLogin, CURLOPT_POSTFIELDS, $userData);         #post发送的数据
        curl_setopt($curlLogin, CURLOPT_HTTPHEADER, array(              #设置http头数组
            'application/x-www-form-urlencoded; charset=utf-8', 
            'Content-length: ' . strlen($userData)
            ));           

        $oo = curl_exec($curlLogin);
        $login_url = 'http://my.mi.com/portal';
        curl_setopt($curlLogin, CURLOPT_URL, $login_url);               #设置访问的URL
        curl_setopt($curlLogin, CURLOPT_POST, false);                    #不发送post请求
        //curl_setopt($curlLogin, CURLOPT_HEADER, true);                 #不把头文件信息作为数据流输出
        curl_setopt($curlLogin, CURLOPT_HTTPHEADER, array("Content-type: text/xml"));
        $ooNew = curl_exec($curlLogin);
        curl_close($curlLogin);
        \Kint::dump($oo);
    }

    public function getTestTwo()
    {
        $data='username=8236138@qq.com&password=YAB4894286&remember=1';
        $curlobj = curl_init();         // 初始化
        curl_setopt($curlobj, CURLOPT_URL, "http://www.imooc.com/user/login");      // 设置访问网页的URL
        curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);            // 执行之后不直接打印出来

        // Cookie相关设置，这部分设置需要在所有会话开始之前设置
        date_default_timezone_set('PRC'); // 使用Cookie时，必须先设置时区
        curl_setopt($curlobj, CURLOPT_COOKIESESSION, TRUE); 

        curl_setopt($curlobj, CURLOPT_COOKIEFILE, 'cookiefile');
        curl_setopt($curlobj, CURLOPT_COOKIEJAR, 'cookiefile');
        curl_setopt($curlobj, CURLOPT_COOKIE, session_name() . '=' . session_id());

        curl_setopt($curlobj, CURLOPT_HEADER, 0); 
        // 注释掉这行，因为这个设置必须关闭安全模式 以及关闭open_basedir，对服务器安全不利
        curl_setopt($curlobj, CURLOPT_FOLLOWLOCATION, 1);  

        curl_setopt($curlobj, CURLOPT_POST, 1);  
        curl_setopt($curlobj, CURLOPT_POSTFIELDS, $data);  
        curl_setopt($curlobj, CURLOPT_HTTPHEADER, array(
            "application/x-www-form-urlencoded; charset=utf-8", 
            "Content-length: ".strlen($data)
            )); 
        curl_exec($curlobj);    // 执行
        curl_setopt($curlobj, CURLOPT_URL, "http://www.imooc.com/space/index");
        curl_setopt($curlobj, CURLOPT_POST, 0);  
        curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("Content-type: text/xml"));
        $output =  curl_exec($curlobj);
        //$output=$this->curl_redir_exec($curlobj);  // 执行
        curl_close($curlobj);           // 关闭cURL
        \kint::dump($output);
    }
    /**
     * 自定义实现页面链接跳转抓取
     */
    private function curl_redir_exec($ch,$debug="") 
    { 
        static $curl_loops = 0; 
        static $curl_max_loops = 20; 

        if ($curl_loops++ >= $curl_max_loops) 
        { 
            $curl_loops = 0; 
            return FALSE; 
        } 
        curl_setopt($ch, CURLOPT_HEADER, true); // 开启header才能够抓取到重定向到的新URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        $data = curl_exec($ch); 
        // 分割返回的内容
        $h_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE); 
        $header = substr($data,0,$h_len);
        $data = substr($data,$h_len - 1);

        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
        if ($http_code == 301 || $http_code == 302) 
        { 
            $matches = array(); 
            preg_match('/Location:(.*?)\n/', $header, $matches); 
            $url = @parse_url(trim(array_pop($matches))); 
            // print_r($url); 
            if (!$url) 
            { 
                //couldn't process the url to redirect to 
                $curl_loops = 0; 
                return $data; 
            } 
            $last_url = parse_url(curl_getinfo($ch, CURLINFO_EFFECTIVE_URL)); 
            if (!isset($url['scheme'])) 
                $url['scheme'] = $last_url['scheme']; 
            if (!isset($url['host'])) 
                $url['host'] = $last_url['host']; 
            if (!isset($url['path'])) 
                $url['path'] = $last_url['path'];

            $new_url = $url['scheme'] . '://' . $url['host'] . $url['path'] . (isset($url['query'])?'?'.$url['query']:''); 
            curl_setopt($ch, CURLOPT_URL, $new_url); 

            return $this->curl_redir_exec($ch); 
        } else { 
            $curl_loops=0; 
            return $data; 
        } 
    }
}

