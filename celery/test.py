import pika

# Set the connection parameters to connect to rabbit-server1 on port 5672
# on the / virtual host using the username "guest" and password "guest"
credentials = pika.PlainCredentials('test', 'test')
parameters = pika.ConnectionParameters('10.66.4.29',5672,'/',credentials)
connection = pika.BlockingConnection(parameters)
print "done"
