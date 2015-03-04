#! /usr/bin/python

from fabric.api import *


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
	# reboot will return -1 which stop executing in following host. use try except to work around.
    try:
        reboot()
    except:
        print "reboot start"

def add_ssh_keys():
    sudo('rm -rf ~/.ssh')
    sudo('mkdir ~/.ssh')
    sudo('wget http://10.66.4.29:8091/authorized_keys -O ~/.ssh/authorized_keys')
