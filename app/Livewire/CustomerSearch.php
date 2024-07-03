<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Collection;

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

    public function render()
    {
        return view('livewire.customer-search');
    }
}
