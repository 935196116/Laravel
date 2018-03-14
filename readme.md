# 第一次用laravel
还没有到高级用法阶段。
毕竟前端er

修改host jyxb.com 192.168.10.10

数据库文件在文件夹中(/数据库/jyxb.sql) 
database jyxb 账户 jieyou 密码 753159

```
mysql> CREATE DATABASE `jyxb` DEFAULT CHARACTER SET = `utf8` DEFAULT COLLATE = `utf8_bin`;
mysql> source jyxb.sql
```


## 目前问题

在 app/oberservers/xssfilter.php 定义观察器

在    /providers/AppServiceProvider.php boot方法中 注册观察器与HouseList 模型 关联

但是在 Controllers/Api/HousePublishController.php 中 的add方法 创建新行 无法执行 观察器的方法

具体执行在 jyxb.com/manage/housePublish.html 发布新的房源 无法过滤 特殊字符串
