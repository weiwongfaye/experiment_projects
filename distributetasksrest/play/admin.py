from django.contrib import admin

# Register your models here.
from .models import Channel, Task


admin.site.register(Channel)
admin.site.register(Task)
