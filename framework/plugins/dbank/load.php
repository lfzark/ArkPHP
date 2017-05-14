<?php
/**
 -*- coding: utf-8 -*-
 -*- system OS: windows2008 -*-
 -*- work Tools:Phpstorm -*-
 -*- language Ver: php7.1 -*-
 -*- agreement: PSR-1 to PSR-11 -*-
 -*- filename: DynamicBank.load-*-
 -*- version: 1.0 -*-
 -*- structure: common framework -*-
 -*- designer: 沈启威 -*-
 -*- developer: 沈启威 -*-
 -*- partner: 沈启威 -*-
 -*- chinese Context:
 -*- DynamicPassVer1.0 动态密库服务信息调用单元
 */
if($_GET){
    if($_GET['username'] and $_GET['password']){
        $username = $_GET['username'];
        $password = $_GET['password'];
        session_start();
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_connect($socket, '172.16.60.22', 49999);
        socket_write($socket,'login type from browser', strlen('login type from browser'));
        $m = socket_read($socket, 2048);
        if($m == 'service online'){
            $receipt = null;
            $command = null;
            if($receipt == null and $command == null){
                while(true){
                    socket_write($socket,'operate validate username', strlen('operate validate username'));
                    $command = $receipt = socket_read($socket, 2048);
                    if($receipt == 'commit username'){
                        break;
                    }
                }
            }
            if($receipt == 'commit username'){
                while(true){
                    socket_write($socket,'username:'.$_SESSION['code'], strlen('username:'.$_SESSION['code']));
                    $receipt = socket_read($socket, 2048);
                    if($receipt == 'complete'){
                        break;
                    }
                }
            }
            if($receipt == 'complete' and $command == 'commit username'){
                while(true){
                    socket_write($socket,'operate validate password',strlen('request validate password'));
                    $command = $receipt = socket_read($socket, 2048);
                    if($receipt == 'commit password'){
                        break;
                    }
                }
            }
            if($receipt == 'commit password'){
                while(true){
                    socket_write($socket,'password:'.$_GET['password'],strlen('password:'.$_GET['password']));
                    $receipt = socket_read($socket, 2048);
                    if($receipt == 'complete'){
                        break;
                    }
                }
            }
            if($receipt == 'complete' and $command == 'commit password'){
                while(true){
                    socket_write($socket,'operate validate token',strlen('request validate token'));
                    $command = $receipt = socket_read($socket, 2048);
                    if($receipt == 'commit token'){
                        break;
                    }
                }
            }
            if($receipt == 'commit token'){
                while(true){
                    socket_write($socket,'token:'.$_SESSION['token'],strlen('token:'.$_SESSION['token']));
                    $receipt = socket_read($socket, 2048);
                    if($receipt == 'complete'){
                        break;
                    }
                }
            }
            if($receipt == 'complete' and $command == 'commit token') {
                while (true){
                    socket_write($socket, 'operate request validate', strlen('operate request token'));
                    $receipt = socket_read($socket, 2048);
                    if ($receipt == 'validate success') {
                        $_SESSION['time'] = date('Y-m-d H:i:s', time());
                        echo('验证成功,系统将为您跳转至管理界面');
                        break;
                    } elseif($receipt == 'validate failed'){
                        session_destroy();
                        echo('验证失败，请稍后重试');
                        break;
                    }else{
                        session_destroy();
                        echo('命令未执行');
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
        echo('请输入登录信息');
    }
}