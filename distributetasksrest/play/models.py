import uuid
from django.db import models
# Create your models here.


class Channel(models.Model):
    channelName = models.CharField(max_length = 50)
    channelStatus = models.CharField(max_length = 50)
    def __str__(self):
    	return self.channelName

class Task(models.Model):
    testChannel = models.ForeignKey(Channel,related_name='tasks',on_delete=models.CASCADE)
    id = models.UUIDField(primary_key=True, default=uuid.uuid4, editable=False)
    testName = models.CharField(max_length = 50)
    testPath = models.CharField(max_length = 50)
    testPlatform = models.CharField(max_length = 50)
    testRun = models.CharField(max_length = 50)

    def __str__(self):
    	return self.testName

