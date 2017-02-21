<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2016/11/3
 * Time: 下午 01:37
 */
class Code
{
//    public $code;               //发送的随机的验证码//替换模板中的{参数} 比如{code}  就用 code%3D1234
    public $appkey='21539';             //appkey值
    public $sign='10e37d1899c9a3a68a406eed8c0bfa0a';               //sign值
    public $app='sms.send';    //固定值
    public $tempid='50845';    //短信模板编号

    function get_message($a_parm=array()){
        if(!is_array($a_parm)){
            return false;
        }
        //combinations
        $a_parm['format']=empty($a_parm['format'])?'json':$a_parm['format'];
        $apiurl=empty($a_parm['apiurl'])?'http://api.k780.com:88/?':$a_parm['apiurl'].'/?';
        unset($a_parm['apiurl']);
        foreach($a_parm as $k=>$v){
            $apiurl.=$k.'='.$v.'&';
        }
        $apiurl=substr($apiurl,0,-1);
        if(!$callapi=file_get_contents($apiurl)){
            return false;
        }
        //format
        if($a_parm['format']=='base64'){
            $a_cdata=unserialize(base64_decode($callapi));
        }elseif($a_parm['format']=='json'){
            if(!$a_cdata=json_decode($callapi,true)){
                return false;
            }
        }else{
            return false;
        }
        //array
        if($a_cdata['success']!='1'){
            echo $a_cdata['msgid'].' '.$a_cdata['msg'];
            return false;
        }
        return $a_cdata['result'];
    }
    /*
     *发送短信 参数：11位手机号码
     * return  验证码（int）
     */
    public function send_message($phone='')
    {
        if(is_string($phone) && strlen($phone)==11){
            $code=rand(1000,9999);
            $nowapi_parm['appkey']=$this->appkey;//替换您的appkey
            $nowapi_parm['sign']=$this->sign;//替换您的sign
            $nowapi_parm['app']=$this->app;
            $nowapi_parm['tempid']=$this->tempid;
            $nowapi_parm['param']='code%3D'.$code;//替换模板中的{参数} 比如{code}  就用 code%3D1234
            $nowapi_parm['phone']=$phone;
            $re=$this->get_message($nowapi_parm);
            if($re){
                return $code;
            }
        }else{
            echo "发送失败";
            return false;
        }
    }

}