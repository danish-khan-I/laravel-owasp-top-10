@foreach(config('site.socials') as $key => $value)
    <a href="{{$value}}" target="_blank"><i class="fa {{$key}}"></i></a>
@endforeach