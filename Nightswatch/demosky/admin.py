from django.contrib import admin
from demosky.models import UserProfile

# Register your models here.
from demosky.models import Sensors

from demosky.models import Chat
from demosky.models import sensormine
from demosky.models import topics
from demosky.models import Sensor_status

admin.site.register(Sensors)  # registering sensor table

admin.site.register(UserProfile) # registering userprofile table

admin.site.register(Chat)# registering chat table

admin.site.register(sensormine)# registering sensormine table

admin.site.register(topics)# registering topic table
admin.site.register(Sensor_status)# registering sensor_status table