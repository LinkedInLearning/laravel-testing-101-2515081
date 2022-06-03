@if($errors->any())
    <div class="text-rose-800 border border-2 border-rose-800 py-3 px-6 mb-10 rounded">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
