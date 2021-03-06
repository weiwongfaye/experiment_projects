#! /usr/bin/python

from fabric.api import *
import paramiko


env.hosts = [
    '10.66.129.60',
    '10.66.129.61',
    '10.66.129.62',
    '10.66.129.63',
    '10.66.129.64',
    '10.66.129.65',
    '10.66.129.66',
    '10.66.129.67',
    '10.66.129.68',
    '10.66.129.69',
    '10.66.129.70',
    '10.66.129.71',
    '10.66.129.72'
    ]
env.user = 'root'
env.password = 'your_password'

def reboot_machine():
    if _is_host_up(env.host,int(env.port)) is True:
    	with settings(warn_only=True):
            reboot()


def disable_fw():
    if _is_host_up(env.host,int(env.port)) is True:
        with settings(warn_only=True):
            sudo('systemctl stop firewalld') 
            sudo('systemctl disable firewalld')

def add_ssh_keys():
    if _is_host_up(env.host,int(env.port)) is True:
        sudo('rm -rf ~/.ssh')
        sudo('mkdir ~/.ssh')
        sudo('wget http://10.66.4.29:8091/authorized_keys -O ~/.ssh/authorized_keys')

def stop_splunk():
    with settings(warn_only=True):
        run('/usr/local/eserv/splunk/bin/splunk stop -f')

        
def uninstall_splunk():
    stop_splunk()
    with settings(warn_only=True):
        sudo('rm -rf /usr/local/eserv/splunk')


def df_info():
    if _is_host_up(env.host,int(env.port)) is True:
        run("df -h")

def _is_host_up(host, port):
    # Set the timeout
    original_timeout = socket.getdefaulttimeout()
    new_timeout = 3
    socket.setdefaulttimeout(new_timeout)
    host_status = False
    try:
        transport = paramiko.Transport((host, port))
        host_status = True
    except:
        print('***Warning*** Host {host} on port {port} is down.'.format(
            host=host, port=port)
        )
    socket.setdefaulttimeout(original_timeout)
    return host_status
