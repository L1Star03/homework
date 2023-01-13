function getQueryVariable(variable) {
    //获取url中的传参
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) { return pair[1]; }
    }
    return "这个是一个用户肯定不会取名用的字符串";
}

function addUser(kind, name) {
    // 用于修改页面中所有的url
    // kind: user或admin
    // name: 用户名
    var elements = document.getElementsByTagName('a')
    for (let i = 0; i < elements.length; i++) {
        if (elements[i].href.includes(".html") && !elements[i].href.includes(name)) 
        {   
            // 修改日志 2023-1-11 这里includes第二个不能为kind，因为我的网址user中包括了user
            // 如果链接包含html且不包含个人信息，则加上
            var new_href = elements[i].getAttribute("href") + "?" + kind + "=" + name
            console.log(new_href)
            elements[i].setAttribute('href', new_href);
        }
    }
}


function login() {
    var login = document.getElementById("登陆注册");
    var nav = document.getElementsByClassName("nav navbar-nav navbar-right main-navigation")[0];
    // alert(nav)
    var user = decodeURI(getQueryVariable("user"));
    var admin = decodeURI(getQueryVariable("admin"))
    var button = "<li><a href='./index.html'>退出登陆</a></li>";// 退出登陆按钮
    // alert(user);
    if (user == '这个是一个用户肯定不会取名用的字符串' && admin != '这个是一个用户肯定不会取名用的字符串') {
        // 管理员账号
        login.parentNode.append('您好，管理员' + admin)
        var secret = "<li><a href=''>开发者管理中心</a></li>";
        var self = "<li><a href='./user.html'>个人中心</a></li>";
        login.parentNode.removeChild(login);
        nav.innerHTML += secret
        nav.innerHTML += self
        addUser("admin", admin)
        nav.innerHTML += button;


    }
    else if (user != '这个是一个用户肯定不会取名用的字符串' && admin == '这个是一个用户肯定不会取名用的字符串') {
        //用户账号
        login.parentNode.append("您好，用户" + user)
        var self = "<li><a href='./user.html'>个人中心</a></li>";        
        login.parentNode.removeChild(login);
        nav.innerHTML += button;
        nav.innerHTML += self
        console.log(user)
        addUser("user", user)
        nav.innerHTML += button;
    }
}



