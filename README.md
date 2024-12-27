<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 项目初始化

拉取项目仓库并进入项目目录

```shell
>> git clone https://github.com/457hkv/car_one_one_back.git
>> cd car_one_one_back/
```

初始化步骤
```shell
# 安装依赖
>> composer install

# 拷贝示例环境变量文件
>> copy .env.example .env

# 初始化 APP_KEY [env.APP_KEY]
>> php artisan key:generate

# 创建存储软连接
# 默认情况下 storage/app/* 的资源无法被外部访问，因为是私有的
# 此命令会在 public 目录下创建 public/storage 对 storage/app/public 的软连接
>> php artisan storage:link

# 初始化迁移文件
>> php artisan migrate          # 运行迁移
>> php artisan migrate:rollback # 回滚迁移

# 启动服务
>> php artisan serv
```
