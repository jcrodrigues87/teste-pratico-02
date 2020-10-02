from rest_framework import serializers
from .models import Profiles, Formations

# Serializadores que tranformam os dados para serem salvos no banco de dados

class FormationsSerializer(serializers.ModelSerializer):
	class Meta:
		model = Formations
		fields = '__all__'

class FormationsSerializerDTO(serializers.ModelSerializer):
	class Meta:
		model = Formations
		exclude = ('profile',)

class ProfileSerializerDTO(serializers.ModelSerializer):
	formations = FormationsSerializerDTO(many= True, required= False)

	class Meta:
		model = Profiles
		fields = '__all__'
	
	def create(self, validated_data):
		formations = validated_data['formations']

		# Create profile
		profile = Profiles.objects.create(**validated_data)
		profile.save()

		# Create formations
		for formation in formations: 
			createdFormation = Formations.objects.create(profile=profile, **formation)
			createdFormation.save()

		return profile

class ProfileSerializer(serializers.ModelSerializer):
	formations = FormationsSerializerDTO(source="formations_set", many= True, required= False)

	class Meta:
		model = Profiles
		fields = '__all__'