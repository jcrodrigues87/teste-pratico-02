from django.db import models

# Modelagem do banco de dados

class Profiles(models.Model):
    # Dados principais
    name = models.CharField(max_length=100, help_text="DD/MM/AAAA")
    birth = models.CharField(max_length=10, help_text="DD/MM/AAAA")
    email = models.CharField(max_length=100, unique=True)
    telephone = models.CharField(max_length=16, help_text="(DDD) 9XXXX-XXXX")
    cod = models.AutoField(primary_key=True)
    
    # Dados de endereço
    cep = models.CharField(max_length=16, help_text="XXXXX-XXX")
    uf = models.CharField(max_length=2)
    city = models.CharField(max_length=100)
    street = models.CharField(max_length=100)
    complement = models.CharField(max_length=100)

    # Habilidades
    java = models.BooleanField('Java', default=False)
    node = models.BooleanField('Node.js', default=False)
    cpp = models.BooleanField("C++", default=False)
    php = models.BooleanField("PHP", default=False)
    python = models.BooleanField("Python", default=False)
    go = models.BooleanField("Go", default=False)
    advpl = models.BooleanField("ADVPL", default=False)
    angular = models.BooleanField("Angular", default=False)
    electron = models.BooleanField("Electron", default=False)
    react= models.BooleanField("React", default=False)
    native = models.BooleanField("React Native", default=False)
    mongo = models.BooleanField("MongoDB", default=False)
    sql= models.BooleanField("MySQL", default=False)
    sqlServer = models.BooleanField("SQLServer", default=False)
    postgres = models.BooleanField("Postgres", default=False)
    backend = models.BooleanField("Backend", default=False)
    frontend = models.BooleanField("Front-End", default=False)


# Modelo das formações com o curso, instituto, conclusão e chave estrangeira que está relacionada a um perfil
class Formations(models.Model):
    course = models.CharField(max_length=100)
    institute = models.CharField(max_length=100)
    conclusion = models.DateField()
    profile = models.ForeignKey(Profiles, on_delete=models.CASCADE)
