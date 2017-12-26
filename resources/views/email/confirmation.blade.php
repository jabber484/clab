User {{$name}},
<br>
<br>
This email confirm your booking of the following item(s):
<br>
@foreach($item as $n)
{{$n->name}}
<br>
@endforeach
<br>
During the period {{$from}} to {{$to}}
<br>
<br>
Sent you by Creativity Lab (c!ab)