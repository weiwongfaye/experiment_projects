from celery import Celery
app = Celery('tasks', backend='amqp',broker='amqp://test:test@192.168.1.12:5672/')
@app.task
def add(x,y):
	return x+y
