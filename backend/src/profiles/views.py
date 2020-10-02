
from rest_framework.decorators import api_view
from rest_framework.response import Response
from .serializers import FormationsSerializer, ProfileSerializer, ProfileSerializerDTO

from .models import Formations, Profiles

# Tela basica dos perfis que mostra as paginas existentes
@api_view(['GET'])
def profileOverview(request):

    response_urls = {
        'List':'/profile-list/', 'Create':'/profile-create/'
        }


    return Response(response_urls)

# Parte da API que lida com as requisições de cadastro feitas pelo axios
@api_view(['POST'])
def profileCreate(request):
    serializer = ProfileSerializerDTO(data=request.data)

    if serializer.is_valid():
        serializer.save()
        return Response(serializer.data)
    else:
        print(serializer.data)
        return Response(serializer.errors)
    
# Parte da API que lida com as requisições de buscar todos os dados no banco de dados
@api_view(['GET'])
def profileList(request):
    profiles = Profiles.objects.all()
    serializer = ProfileSerializer(profiles, many=True)
    return Response(serializer.data)

# API para mostrar todas as formacoes que estão salvas no banco de dados
@api_view(['GET'])
def formations(request):
    formations = Formations.objects.all()
    serializer = FormationsSerializer(formations, many=True)
    return Response(serializer.data)
