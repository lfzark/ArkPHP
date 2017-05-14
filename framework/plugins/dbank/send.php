<?php
/**
 -*- coding: utf-8 -*-
 -*- system OS: windows2008 -*-
 -*- work Tools:Phpstorm -*-
 -*- language Ver: php7.1 -*-
 -*- agreement: PSR-1 to PSR-11 -*-
 -*- filename: DynamicBank.send-*-
 -*- version: 1.0 -*-
 -*- structure: common framework -*-
 -*- designer: 沈启威 -*-
 -*- developer: 沈启威 -*-
 -*- partner: 沈启威 -*-
 -*- chinese Context:
 -*- DynamicPassVer1.0 动态密库服务信息调用单元
 */
if($_GET){
    if($_GET['username']){
        session_start();
        $_SESSION['ID'] = session_id();
        $_SESSION['time'] = date('Y-m-d H:i:s', time());
        $_SESSION['code'] =$_GET['username'];
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_connect($socket, '172.16.60.22', 49999);
        socket_write($socket, 'login type from browser', strlen('login type from browser'));
        $m = socket_read($socket, 2048);
        if($m == 'service online'){
            $receipt = null;
            $command = null;
            if($receipt == null and $command == null){
                while (true) {
                    socket_write($socket, 'operate send username', strlen('operate send username'));
                    $command = $receipt = socket_read($socket, 2048);
                    if ($receipt == 'commit username') {
                        break;
                    }
                }
            }
            if($receipt == 'commit username'){
                while(true){
                    socket_write($socket, 'username:'.$_SESSION['code'], strlen('username:'.$_SESSION['code']));
                    $receipt = socket_read($socket, 2048);
                    if($receipt == 'complete'){
                        break;
                    }
                }
            }
            if($receipt == 'complete' and $command == 'commit username'){
                while(true){
                    socket_write($socket, 'operate send session',strlen('operate send session'));
                    $command = $receipt = socket_read($socket, 2048);
                    if($receipt == 'commit session'){
                        break;
                    }
                }
            }
            if($receipt == 'commit session'){
                while(true){
                    socket_write($socket,'session:'.$_SESSION['ID'],strlen('session:'.$_SESSION['ID']));
                    $receipt = socket_read($socket, 2048);
                    if($receipt == 'complete'){
                        break;
                    }
                }
            }
            if($receipt == 'complete' and $command == 'commit session') {
                while(true){
                    $buffer = null;
                    socket_write($socket, 'operate request token', strlen('operate request token'));
                    $receipt = socket_recv($socket, $buffer, 2048,0);
                    $receipt = explode(':', $buffer);
                    if (count($receipt) == 2 and $receipt[0] == 'token') {
                        $_SESSION['token'] = $receipt[1];
                        $_SESSION['time'] = date('Y-m-d H:i:s', time());
                        echo('密码已经发送，请查看手机短信');
                        break;
                    }elseif($receipt[0] == 'logged'){
                        session_destroy();
                        echo('当前账号已登录，请稍后再试');
                        break;
                    } else {
                        session_destroy();
                        echo('密码请求失败，请稍后重试');
                        break;
                    }
                }
            }
        }else{
            echo('服务未上线，请稍后进行操作');
        }
        socket_close($socket);
        session_write_close();
    }else{
        echo('请输入用户账号');
    }
}
