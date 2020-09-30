from django.db import models

# Create your models here.

class Profiles(models.Model):
    # Principal Data
    nome = models.CharField(max_length=100, help_text="DD/MM/AAAA")
    nascimento = models.CharField(max_length=10, help_text="DD/MM/AAAA")
    email = models.EmailField(max_length=254, primary_key=True)
    telefone = models.CharField(max_length=16, help_text="(DDD) 9XXXX-XXXX")
    
    # Adress
    cep = models.CharField(max_length=16, help_text="XXXXX-XXX")
    uf = models.CharField(max_length=2)
    cidade = models.CharField(max_length=100)
    logradouro = models.CharField(max_length=100)
    complemento = models.CharField(max_length=100)

    # Skills
    JAVA = models.BooleanField('Java', default=False)
    NODE = models.BooleanField('Node.js', default=False)
    CPP = models.BooleanField("C++", default=False)
    PHP = models.BooleanField("PHP", default=False)
    PYTHON = models.BooleanField("Python", default=False)
    GO = models.BooleanField("Go", default=False)
    ADVPL = models.BooleanField("ADVPL", default=False)
    ANGULAR = models.BooleanField("Angular", default=False)
    ELECTRON = models.BooleanField("Electron", default=False)
    REACT= models.BooleanField("React", default=False)
    NATIVE = models.BooleanField("React Native", default=False)
    MONGO = models.BooleanField("MongoDB", default=False)
    SQL= models.BooleanField("MySQL", default=False)
    SQLSERVER = models.BooleanField("SQLServer", default=False)
    POSTGRES = models.BooleanField("Postgres", default=False)
    BACKEND = models.BooleanField("Backend", default=False)
    FRONTEND = models.BooleanField("Front-End", default=False)

    models.TextField(name="Formacoes")

    # Education
    #formacoes = models.ManyToManyField()