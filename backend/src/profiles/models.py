from django.db import models

# Create your models here.

class Profiles(models.Model):
    # Principal Data
    name = models.CharField(max_length=100, help_text="DD/MM/AAAA")
    birth = models.CharField(max_length=10, help_text="DD/MM/AAAA")
    email = models.EmailField(max_length=254, primary_key=True)
    telephone = models.CharField(max_length=16, help_text="(DDD) 9XXXX-XXXX")
    cod = models.IntegerField(default=1)
    
    # Adress
    cep = models.CharField(max_length=16, help_text="XXXXX-XXX")
    uf = models.CharField(max_length=2)
    city = models.CharField(max_length=100)
    street = models.CharField(max_length=100)
    complement = models.CharField(max_length=100)

    # Skills
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

    formations = models.TextField()

    # Education
    #formacoes = models.ManyToManyField()

    '''
    def save(self, *args, **kwargs):
        # This means that the model isn't saved to the database yet
        if self._state.adding:
            # Get the maximum cod value from the database
            cod = self.objects.all().aggregate(largest=models.Max('display_id'))['largest']

            # aggregate can return None! Check it first.
            # If it isn't none, just use the last ID specified (which should be the greatest) and add one to it
            if cod is not None:
                self.cod = cod + 1

        super(Profiles, self).save(*args, **kwargs)
    '''