from django.conf.urls import include, url
from . import views

urlpatterns = [
    url(r'^$', views.evento_new, name = 'evento_new'),

]