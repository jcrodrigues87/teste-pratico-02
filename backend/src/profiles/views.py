from django.shortcuts import render
from django.http import JsonResponse,HttpResponse
import rest_framework.response as rest

from rest_framework.decorators import api_view
from rest_framework.response import Response
from .serializers import FormationsSerializer, FormationsSerializerDTO, ProfileSerializer, ProfileSerializerDTO
from django.shortcuts import render

from .models import Formations, Profiles
# Create your views here.

@api_view(['GET'])
def profileOverview(request):

    response_urls = {
        'List':'/profile-list/', 'Create':'/profile-create/'
        }


    return Response(response_urls)

@api_view(['POST'])
def profileCreate(request):
    serializer = ProfileSerializerDTO(data=request.data)

    if serializer.is_valid():
        serializer.save()
        return Response(serializer.data)
    else:
        print(serializer.data)
        return Response(serializer.errors)
    
@api_view(['GET'])
def profileList(request):
    profiles = Profiles.objects.all()
    serializer = ProfileSerializer(profiles, many=True)
    return Response(serializer.data)

@api_view(['GET'])
def formations(request):
    formations = Formations.objects.all()
    serializer = FormationsSerializer(formations, many=True)
    return Response(serializer.data)
