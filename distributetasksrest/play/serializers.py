from rest_framework import serializers
from .models import Task, Channel


class TaskSerializer(serializers.HyperlinkedModelSerializer):
    class Meta:
        model = Task
        fields = '__all__'	


class ChannelSerializer(serializers.HyperlinkedModelSerializer):
    class Meta:
        model = Channel
        # fields = '__all__'
        fields = ('url','id','channelName','channelStatus','tasks')