<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="<?php echo site_url("static");?>/style/index.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo site_url("static");?>/script/lib/jquery-1.9.1.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo site_url("static");?>/script/src/common/util.js" charset="utf-8"></script>
    <script type="text/javascript" data-main="<?php echo site_url("static");?>/script/src/main/main.js" src="<?php echo site_url("static");?>/script/lib/require.js" charset="utf-8"></script>
    <title></title>
    <style>
        .mainPanel{
            background-color: #dfdfdf;
        }
        .medicalIframe{
            display: none;
        }
        .medicalTable{
            width: 100%;
        }
        .medicalTable tr {
            vertical-align: top;
        }
        .table_left{
            width: 120px;
            text-align: center;
            background-color: lightblue;
            color: #5e80e2;
            font-size: 18px;
            height: 500px;
        }
        .mainDiscriptionPanel{
            position: static!important;
            margin-top: 20px;
        }
        .table_left ul{list-style: none;margin-left: 0;}
        .table_left ul li {
            margin-top: 25px;
        }
        .table_head{
            background-image: linear-gradient(to bottom, #5e80e2, #536fc3);
            height: 40px;
            line-height: 40px;
        }
        .table_head span{
            color: #ffffff;
            margin-left: 18px;
        }
    </style>
</head>
<body>
<div class="mainPanel">
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
            <span class="register">注册</span>
        </div>
    </div>
    <div class="mainBody">
        <div>
             <table class="medicalTable">
                 <tbody>
                    <tr>
                        <td colspan="2">
                            <div class="table_head">
                                 <?php foreach($classifications as $key => $item){ ?>
                                     <span class="change_classification" data-id="<?php echo $key ?>"><?php echo $item ?></span>
                                 <?php } ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_left">
                            <div>
                                <ul>
                                    <li>
                                        <span class="home">主页</span>
                                    </li>
                                    <li>
                                        <span class="courseware">课件</span>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <div>
                                <?php include 'document.php' ?>
                                <div class="doctorListPanel">
                                    <div class="doctorListScroll">

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                 </tbody>
             </table>
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