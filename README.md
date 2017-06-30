# WEngine
Used for Taobaoke shopping store.

The getcode.php is used for let the Taobaoke shopping store able to use. It's placed in the homedir of web authen IP//shopping_zhou/php.
We can let our wexin open hao can access to different IP address though We just autherize one IP address the ability to access.
In fact, The basic function of it is to get the code form our authorized IP and add this code to our new IP address url.

The weixin.account.class.php is a file of WEngine. It should be dealed carefully,because sometimes we will update WEngine and this file 
will be replaced. In this case We should use The file replace file on the webserver or change the code of weixin.account.class.php on the
server. The file's dirpath is /mnt/www/WEngine/framework/class/weixin.account.class.php

The code should be changed is on line 1574----1586

We should change the code as follows.
  
  <code>
  public function getOauthCodeUrl($callback, $state = '') {
	    if ($this->account['key'] == 'wx9d1b2a31f4ad0da4') {
	        return "http://www.hzchuangxiangzhe.cn/codetoany/getcode.php?auk=w&partUrl=".base64_encode(str_replace(array('http://wengine.zhedacxz.com'), '', urldecode($callback)))."&state={$state}";
        }
		return "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$this->account['key']}&redirect_uri={$callback}&response_type=code&scope=snsapi_base&state={$state}#wechat_redirect";
	}
	
	public function getOauthUserInfoUrl($callback, $state = '') {
        if ($this->account['key'] == 'wx9d1b2a31f4ad0da4') {
            return "http://www.hzchuangxiangzhe.cn/codetoany/getcode.php?auk=w&partUrl=".base64_encode(str_replace(array('http://wengine.zhedacxz.com'), '', urldecode($callback)))."&scope=snsapi_userinfo&state={$state}";
        }
		return "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$this->account['key']}&redirect_uri={$callback}&response_type=code&scope=snsapi_userinfo&state={$state}#wechat_redirect";
	}
  </code>
  
  $this->account['key'] is our weixin appkey.
