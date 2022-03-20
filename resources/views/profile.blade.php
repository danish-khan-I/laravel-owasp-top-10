<x-app>
    <div class="themesflat-spacer clearfix" data-desktop="80" data-mobile="60" data-smobile="60"></div>
    <div class="container">
        <div class="col-md-8 m-auto">
            <h3 class="mb-2">Update your profile</h3>
            @error('err')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="form-submit">
                <form action="" method="post">
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class=" wow fadeInUp">
                        <input type="email" name="email" placeholder="Email Address" value="{{$user->email}}">
                    </div>

                    <div class=" wow fadeInUp">
                        <input type="password" name="password" placeholder="Enter new password to change">

                    </div>
                    <!--  <select name="is_admin">  <option> True</option> <option> False</option> </select> --->
                    @csrf

                    <div class="send">
                        <button class="message-submit" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="themesflat-spacer clearfix" data-desktop="80" data-mobile="60" data-smobile="60"></div>
</x-app>
