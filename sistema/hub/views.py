from django.shortcuts import render
from .forms import EventoForm

# Create your views here.
def hub_list(request):
    return render(request, 'hub/dashboard.html', {})
	
def evento_new(request):
	form = EventoForm()
	return render(request, 'hub/dashboard.html', {'form': form})