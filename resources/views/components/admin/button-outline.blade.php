<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 text-slate-800 border-slate-800 border rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-gray-700 hover:text-white focus:text-white active:bg-slate-200 focus:bg-slate-200 focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
