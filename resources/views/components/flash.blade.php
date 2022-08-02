@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" id="flashMsg">
        <div class="alert alert-primary border-0 shadow-sm p-3 mb-5 bg-body rounded" role="alert">
            {{ session('message') }}
        </div>
    </div>
@endif

<style>

</style>