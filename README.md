PureWebIn
=========

简单的图书管理系统
完成一个小型的图书管理系统。不会很难, 不要担心，在上课结束后我会统一说明要求。

写在任务之前
正常的管理系统都有crud(create、read、update、delete)操作，为了简化程序，这里只需要read操作
本次任务可以不使用数据库，所以数据以json的格式预存到本地，当然使用数据库更佳。
系统的视觉稿在附件中可以得到，为了大家方便，这次仅用png图片格式，大家只要做出大致效果就ok。当然你可以设计自己的图形界面
如管理员登陆身份验证，你只需要发一个get请求到本地服务器，然后取本地管理员的数据进行比较验证
如图书所有信息可以以json的数据格式存在一个js文件中，然后需要时发相应的get请求获取
登陆页

包括用户名和密码两个用户字段
前端表单验证包括邮箱格式
后台登陆验证管理员身份，是管理员进入系统，否则停留登陆页，并给予提示。
所有书籍展示页

支持分页功能
支持类型检索
单本书籍展示页

展示的书籍详情页应该至少包括作者(author)、出版日期(pubDate)、书名(name)、价格(price)、类型(type)、书籍标示(id)等信息
需要展示书籍的所有字段信息
一本书籍有多个图片展示，点击图片切换时添加CSS3动画切换效果，具体效果可以自定义
检索功能

在书籍展示页添加一个搜索框
搜索框监听keyup事件，当keyup时，向后台发送一个请求，同时将搜索框中的内容与本地预存的数据进行模糊匹配，在检索结果页面展示相应检索信息
写在任务之后

当你到公司工作你会发现，几乎所有的公司都有一套内部完整的体系，从前端到后端，这些框架可能是自主编写的，也可能取材于开源框架，然后做一些修改，但对与大部分新人来说，都是全新的、没接触过的内容，在熟悉的过程中，你必须不断地查文档、检索资料、独立完成这一过程
本次任务语言不限、框架不限，但提交之前请附上你的系统运行的各界面截图、环境安装说明、使用文档
对于没有头绪的同学你可以使用以下框架之一：
Angular
Backbone
提交内容包括:

可运行系统相关的所有文件
回答以下问题，以pdf格式提交
开发过程中你遇到的问题以及如何解决
对于一些功能你的优化
程序和pdf文件压缩打包并以姓名+学号+联系方式方式命名发至kgtong@163.com，提交截止时间为11月28日, 根据大家完成的作品我们会挑选出一批同学加入我们，有任何问题可以回复此邮件。

PureWeber期待你的加入~

--------

本代码为进入PureWeb之前的测试，小白正在努力中ing……打算进入PureWeb学习