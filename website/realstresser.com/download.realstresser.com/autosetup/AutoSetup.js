const { exec } = require("child_process");

const npmInstalls = "url path chalk events fs http http2 node-datetime axios cluster ciphers os minimist http2-client cloudscraper request net geoip-lite randomstring superagent superagent-proxy";
const aptInstalls = "npm screen php apache2 python3 python3-pip python python-pip perl unzip";
const pip3Installs = "pysocks requests";

Log("Auto Setup has been started!");
Ubuntu();

function Ubuntu()
{
    cmd("apt -y update");
    cmd("apt -y upgrade");
    cmd("apt -y install " + aptInstalls);
    cmd("chmod 777 /var/www/ -R");
    cmd("cd /var/www/html");
    cmd("rm * -R");
    cmd("npm install " + npmInstalls);
    cmd("pip3 install " + pip3Installs);
    cmd("pip3 install " + pip3Installs);
}

function CentOS()
{
    cmd("yum -y update");
    cmd("yum -y upgrade");
    cmd("yum -y install " + aptInstalls);
    cmd("chmod 777 /var/www/ -R");
    cmd("cd /var/www/html");
    cmd("rm * -R");
    cmd("npm install " + npmInstalls);
    cmd("pip3 install " + pip3Installs);
    cmd("wget -O /var/www/html/scripts.zip .zip");
}

function cmd(string)
{
    exec(string);
}

function Log(text)
{
    console.log(text);
}