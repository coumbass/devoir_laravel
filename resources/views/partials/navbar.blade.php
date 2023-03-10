<header class="flex justify-between items-center py-5">
<div>LOGO</div>
<nav>
<livewire:search/>

<a href="{{route('jobs.index')}}" class="mr-5 hover:text-green">Nos missions</a>
@guest
    <a href="{{ route('login')}}" class="mr-5 hover:text-green" >Se connecter</a>
    <a href="{{ route('register')}}" class="mr-5">S'enregistrer</a>
@else
    <a href="{{ route('conversation.index')}}" class="mr-5">Mes Conversations</a>
    <a href="{{ route('home')}}" class="mr-5">Tableau de bord</a>
    <a href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se deconnecter</a>
    <form id="logout-form" method="POST" action="{{ route('logout')}}" style="display: none;">@csrf</form>
@endguest
</nav>

</header>