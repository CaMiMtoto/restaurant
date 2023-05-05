<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-primary  border border-transparent rounded-lg font-semibold text-xs text-gray-900  uppercase tracking-widest hover:bg-primary/80  focus:bg-primary/60  active:bg-primary/80 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
