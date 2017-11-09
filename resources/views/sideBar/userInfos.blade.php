<div class="profile clearfix">
    <div class="profile_pic">
        <img src="/images/avatars/{{ Auth::user()->avatar }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Bienvenu,</span>
        <h2>{{ Auth::user()->name }} </h2>
    </div>
</div>