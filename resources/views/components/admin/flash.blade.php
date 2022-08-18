@if(session()->has('message'))
    <div class="fixed bg-slate-800 font-bold px-10 py-5 right-10 bottom-10 rounded text-slate-100 w-48">
        {{ session()->get('message') }}
    </div>
@endif
