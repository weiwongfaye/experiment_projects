#! /usr/bin/python

import sys
import time
import os
print "test start"

if sys.stdin.readline().strip() == "execute":
	while True:for x in xrange(1,10):
		pass
		line = sys.stdin.readline().strip()
		print "execute command: %s" %line
		print "\n"
		sys.stdout.flush()
		os.system(line)
		sys.stdout.flush() # Remember to flush
else:
	while True:
		print "date now is: %s" % time.time()
		sys.stdout.flush()
		time.sleep(2)