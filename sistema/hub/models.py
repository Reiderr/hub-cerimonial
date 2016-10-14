from django.db import models


# Create your models here.
class Evento(models.Model):
    nome = models.CharField(max_length=200)
    convidados = models.TextField()

    def publish(self):
        self.save()

    def __str__(self):
        return self.title