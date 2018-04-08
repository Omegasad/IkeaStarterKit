<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/default.css"/>
    </head>
    <body>
	
    <div class="nav" id="nav">
        <ul class="nav nav-pills">
            <li> <a href="/">Home</a> </li>
            <li> <a href="/catalog">Catalog</a> </li>
            <li> <a href="/info"> Info </a> </li>
            {usermenu}
            {adminmenu}
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">User Role: {userrole}<b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li><a href="/roles/actor/Guest">Guest</a></li>
                    <li><a href="/roles/actor/User">User</a></li>
                    <li><a href="/roles/actor/Admin">Admin</a></li>
                </ul>
            </li>
        </ul>
    </div>
	
    <div id="container">{content}</div>
    </body>
</html>