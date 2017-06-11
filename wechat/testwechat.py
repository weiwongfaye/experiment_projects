# -*- coding: UTF-8 -*-
import itchat
import time
from itchat.content import *
import time
import logging


logger = logging.getLogger()
handler = logging.FileHandler('wechat.log')
formatter = logging.Formatter(
        '%(asctime)s %(name)-8s %(levelname)-8s %(message)s')
handler.setFormatter(formatter)
logger.addHandler(handler)
logger.setLevel(logging.INFO)


@itchat.msg_register([TEXT,PICTURE,VIDEO], isFriendChat=False, isGroupChat=True,isMpChat=True)
def text_reply(msg):
	if msg['FromUserName'] == xiaobing :
		if msg.type =='Text':
		 	# itchat.send_msg('<AI robot online>: '+msg.text,toUserName=roundtable)
		 	itchat.send_msg(msg.text,toUserName=nextstop)
		 	logger.warn('From xiaobing: {msg}'.format(timestamp=time.localtime(time.time()), 
		 											  msg=msg.text.encode('utf-8')))
		else:
			msg['Text'](msg['FileName'])
		 	itchat.send('@%s@%s' % ({'Picture': 'img', 'Video': 'vid' }.get(msg['Type'], 'fil'),msg['FileName']),
		 							 nextstop)
			logger.warn('Send pictures ')
	elif msg['FromUserName'] == nextstop and msg['FromUserName'] !=mine :
		itchat.send_msg(msg.text,toUserName=xiaobing)
	 	logger.warn('To xiaobing: {msg}'.format(timestamp=time.localtime(time.time()),
	 											  msg=msg.text.encode('utf-8')))



itchat.auto_login(True)
mpList = itchat.search_mps(name=u'小冰')
xiaobing = mpList[0]['UserName']



# get chatroom
rooms =itchat.get_chatrooms()
for room in rooms:
	# if room.NickName == 'Round Table':
	if room.NickName == u'下一站待定':
		nextstop = room.UserName
	elif room.NickName == 'Round Table':
		roundtable = room.UserName

mine = itchat.search_friends()['UserName']


itchat.run()



