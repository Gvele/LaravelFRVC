@extends('layouts.app')

@section('content')
 <h1>Account is {{ $disable }}d</h1> 
  <button 
    class="btn btn-primary" 
    onclick="document.getElementById('account_status_changer').submit()"
  >{{ $enable }} Your account</button>

  <form action="/accountStatus/{{auth()->id()}}" method="POST" id="account_status_changer" style="display:none;">
    @csrf
    @method("PUT")
  </form>



@endsection