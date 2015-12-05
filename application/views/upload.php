<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="<?php echo site_url("static");?>/style/index.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo site_url("static");?>/script/lib/jquery-1.9.1.js" charset="utf-8"></script>
    <script type="text/javascript" data-main="<?php echo site_url("static");?>/script/src/main/main.js" src="<?php echo site_url("static");?>/script/lib/require.js" charset="utf-8"></script>
    <title></title>
</head>
<body>
<div class="mainPanel">

    <div>
        <form action="<?php echo site_url("/"); ?>/Welcome/uploadFile" method="post"  id="file" enctype="multipart/form-data">
            <input name="userfile" type="file">请选择文件
            <input type="submit" value="提交">
        </form>

    </div>

    <div>
        -------------------------------------以上是上传文件接口-------------------------------------
    </div>
    <div class="headerPanel">
        <div class="logo">Logo</div>
        <div class="hearTitle">北美远程医疗咨询中心</div>
        <div class="menuList">
            <ul>
                <li class="aboutUs">关于我们</li>&nbsp;|
                <li class="USAExperts">美国专家</li>&nbsp;|
                <li class="DesPartners ">国内合作方</li>&nbsp;|
                <li class="MecEctSystem ">医学系统教育</li>
            </ul>
        </div>
        <div class="userContainer">
            <span class="login">登录</span>
            <span class="logout">注册</span>
        </div>
    </div>
    <div class="mainBody">
        <div class="doctorListPanel">
            <div class="doctorListScroll">

            </div>
        </div>
        <div class="mainDiscriptionPanel">
                <span class="chinaTitle">
                北美远程医疗咨询中心
                </span>
                <span class="englishTitle">
                    North America TeleMedicine Consultants
                </span>
        </div>

    </div>

    <div class="footer">
        <span>(C) 2010-2015 China Agreement Group</span>
    </div>
</div>
</body>
</html>