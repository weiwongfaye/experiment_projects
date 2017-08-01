from .api import TaskViewSet, ChannelViewSet
from rest_framework.routers import DefaultRouter

router = DefaultRouter()
router.register(r'channel',ChannelViewSet)
router.register(r'tasks',TaskViewSet)

urlpatterns = router.urls