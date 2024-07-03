<div class="customer-search">
    <input
        wire:keyup.debounce="search"
        wire:model="keyword"
        autofocus
        placeholder="Search" />
    @if ($keyword)
        <ul>
            @forelse ($this->highlightedCustomers as $customer)
                <li>
                    {!! $customer['name'] !!}<br>
                    {!! $customer['email'] !!}<br>
                    {!! $customer['address'] !!}
                </li>
            @empty
                <li>
                    No matches found
                </li>
            @endforelse
        </ul>
    @endif
</div>
