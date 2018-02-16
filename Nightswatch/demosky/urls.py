from django.conf.urls import url
from . import views
from django.conf.urls import include
from django.contrib.auth.views import (
 login, logout, password_reset, password_reset_done, password_reset_complete,password_reset_confirm
)


urlpatterns = [
	url(r'^$', views.home),
	url(r'^login/$', login,{'template_name' : 'demosky/login.html'}, name='login'),
	url(r'^logout/$', views.logout),
	url(r'^register/$', views.register),
	url(r'^profile/$', views.profile),
	url(r'^edit_profile/$', views.edit_profile),
	url(r'^reset-password/$', password_reset,name='password_reset'),
	url(r'^reset-password/done/$', password_reset_done, name='password_reset_done'),
    url(r'^reset-password/(?P<uidb64>[0-9A-Za-z_\-]+)/(?P<token>[0-9A-Za-z]{1,13}-[0-9A-Za-z]{1,20})/$',password_reset_confirm, name='password_reset_confirm'),
    url(r'^reset-password/complete/$', password_reset_complete, name='password_reset_complete'),
	#url(r'^profile_picture/$', views.profile_pic)
	url(r'^verify-user/$', views.verify),
	url(r'^manage-user/$', views.manageuser),
	url(r'^manage-sensors/$', views.managesensors),
    url(r'^ajax/favourites_mark/$', views.favourites_mark, name='favourites_mark'),
	url(r'^search_profile/$', views.search, name='search_profile'),
    url(r'^search/$',views.search),
	url(r'^topic_edit/Post/$', views.Post, name='post'),
	url(r'^topic_edit/messages/$', views.Messages, name='messages'),
	url(r'^chat_box/$', views.Chatbox, name='chat'),
	url(r'^chat_box/Post/$', views.Post, name='post'),
	url(r'^chat_box/messages/$', views.Messages, name='messages'),
	url(r'^topic_edit/$', views.topic_edit, name='topic'),
    url(r'^homebasic/$', views.home1, name='home1'),
    url(r'^terms/$', views.terms, name='terms'),
    url(r'^ajax/download_csv/$', views.download_csv, name='download_csv'),

]
