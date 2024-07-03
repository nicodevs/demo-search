<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;

class CustomerSearch extends Component
{
    public string $keyword = '';

    public Collection $customers;

    public function search()
    {
        $this->customers = strlen($this->keyword) > 2
            ? Customer::search($this->keyword)->take(20)->get()
            : collect([]);
    }

    #[Computed]
    public function highlightedCustomers()
    {
        $fields = ['name', 'email', 'address'];
        $highligth = fn ($value) => preg_replace("/({$this->keyword})/i", '<mark>$1</mark>', $value);

        return $this->customers->map(fn ($customer) => array_map($highligth, $customer->only($fields)));
    }

    public function render()
    {
        return view('livewire.customer-search');
    }
}
