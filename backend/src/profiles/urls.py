
from django.urls import path
from . import views

# URLs que fazem a ligação das páginas da API
urlpatterns = [
	path('', views.profileOverview, name="profile-overview"),
	path('profile-create/', views.profileCreate, name="profile-create"),
	path('profile-list/', views.profileList, name="profile-list"),
	path('formations/', views.formations, name="formations"),
	#path('task-detail/<str:pk>/', views.taskDetail, name="task-detail"),
	#path('task-update/<str:pk>/', views.taskUpdate, name="task-update"),
	#path('task-delete/<str:pk>/', views.taskDelete, name="task-delete"),
]
