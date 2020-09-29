from django.shortcuts import render
from django.http import JsonResponse
import django.http as jg

from rest_framework.decorators import api_view
from rest_framework.response import Response
from .serializers import ProfileSerializer

from .models import Profiles
# Create your views here.

@api_view(['GET'])
def profileOverview(request):

    response_urls = {
        'List':'/profile-list/', 'Create':'/profile-create/'
        }

    return Response(response_urls)


@api_view(['POST'])
def profileCreate(request):
	
    return jg.HttpRequest('<h1>Hello World<h1>')
    
    '''
    serializer = ProfileSerializer(data=request.data)

	if serializer.is_valid():
		serializer.save()

	return Response(serializer.data)
    '''
    



@api_view(['GET'])
def profileList(request):
	profiles = Profiles.objects.all().order_by('-id')
	serializer = ProfileSerializer(profiles, many=True)
	return Response(serializer.data)
