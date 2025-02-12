# azerothcore-soap-php-api

# 实现通过soap 接口，连接魔兽服务器
# 实现功能                          
# x 用户注册                          
# x 用户修改密码                      
# x 重置用户密码                          
# x 服务器状态查询
# x 服务器在线玩家查询

# 安装过程：

# 安装YII2
php composer.phar create-project yiisoft/yii2-app-basic basic

# 验证YII 安装结果
# 在项目 web 目录下可以通过下面的命令:
php yii serve

# 注意： 默认情况下Https-server将监听8080。
# 可是如果这个端口已经使用或者你想通过这个方式运行多个应用程序
# 你可以指定使用哪些端口。 只加上 --port 参数：


# php 需要打开soap扩展 根据环境需要 可能要编译安装

# php.ini 文件中
;extension=soap  
# 修改为 
extension=soap

# 