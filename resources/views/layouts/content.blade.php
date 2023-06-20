<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </section>
    @yield('model')
    @include('layouts.setting')
</div>
