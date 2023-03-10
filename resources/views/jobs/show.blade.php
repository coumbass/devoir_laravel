@extends('layouts.app')

@section('content')
<h1 class="text-3xl text-pink-500 mb-3">{{$job->title}}</h1>



   <div class="px-3 py-5 mb-3 shadow-sm hovre:shadow-md rounded border border-pink-200">

   <p class="text-md text-pink-800">{{ $job->description}}</p>
       
       <span class="text-sm text-pink-600">{{ number_format($job->price / 100,2,',',' ') }} cfa

       </span>
   </div>

<section x-data="{open:false}">
    <a href="#" class="text-green-500" @click="open = !open">
        Clic pour soumettre ta candidature
    </a>
    <form x-show="open" x-cloak method="POST" action="{{route('proposals.store',$job)}}">
        @csrf
<textarea class="p-3 font-thin" name="content"></textarea>
<button type="submit" class="block bg-green-700 text-white px-3 py-2">Envoyer son CV</button>
</form>
</section>

@endsection