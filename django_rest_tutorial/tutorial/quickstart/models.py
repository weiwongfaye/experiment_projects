from django.db import models

# Create your models here.
class Task(models.Model):
    name = models.CharField(max_length=200)
    description = models.CharField(max_length=200)
    user=models.CharField(max_length=200)
    storypoint = models.CharField(max_length=200)

