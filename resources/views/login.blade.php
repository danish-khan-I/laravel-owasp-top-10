<x-app>
    <div class="themesflat-spacer clearfix" data-desktop="80" data-mobile="60" data-smobile="60"></div>
    <div class="container">
        <div class="col-md-8 m-auto">
            <div class="form-submit">
                <form action="" method="post">
                    <div class=" wow fadeInUp">
                        <input type="email" placeholder="Email Address">
                    </div>
                    <div class=" wow fadeInUp">
                        <input type="password" placeholder="Password">

                    </div>

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