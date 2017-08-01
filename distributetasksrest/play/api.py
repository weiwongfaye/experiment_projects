from rest_framework.viewsets import ModelViewSet
from rest_framework import permissions

from .serializers import TaskSerializer, ChannelSerializer
from .models import Task, Channel

class TaskViewSet(ModelViewSet):
	queryset = Task.objects.all()
	serializer_class = TaskSerializer
	# permission_classes = (permissions.IsAuthenticated,)


class ChannelViewSet(ModelViewSet):
	queryset = Channel.objects.all()
	serializer_class = ChannelSerializer