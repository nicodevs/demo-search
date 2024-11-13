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
                    <div>{!! $customer['name'] !!}</div>
                    <div>{!! $customer['email'] !!}</div>
                    <div>{!! $customer['address'] !!}</div>
                </li>
            @empty
                <li>
                    No matches found
                </li>
            @endforelse
        </ul>
    @endif
</div>
