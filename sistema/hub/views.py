from django.shortcuts import render

# Create your views here.
def hub_list(request):
    return render(request, 'hub/dashboard.html', {})