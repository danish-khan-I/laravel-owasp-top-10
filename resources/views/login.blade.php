<x-app>
    <div class="themesflat-spacer clearfix" data-desktop="80" data-mobile="60" data-smobile="60"></div>
    <div class="container">
        <div class="col-md-8 m-auto">
            <div class="form-submit">
                <form action="" method="post">
                    <div class=" wow fadeInUp">
                        <input type="email" name="email" placeholder="Email Address" value="{{old('email')}}">
                    </div>
                    @error('err')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class=" wow fadeInUp">
                        <input type="password" name="password" placeholder="Password">

                    </div>
                    @csrf

                    <div class="send">
                        <button class="message-submit" type="submit">Login</button>
                        <p class="mt-2"> or <a href="{{url('/register')}}">create an account?</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="themesflat-spacer clearfix" data-desktop="80" data-mobile="60" data-smobile="60"></div>
</x-app>