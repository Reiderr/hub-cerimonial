from django import forms
from .models import Evento

class EventoForm(forms.ModelForm):

	class Meta:
		model = Evento
		fields = ('nome', 'convidados',)
		widgets = {
            'nome': forms.TextInput(attrs={'class': 'form-control border-input'}),
			'convidados': forms.Textarea(attrs={ 'class': 'form-control border-input'}),
        }