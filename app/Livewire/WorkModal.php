<?php

namespace App\Livewire;

use Livewire\Component;

class WorkModal extends Component
{

    public $test;

    public function save(\Illuminate\Http\Request $request)
    {
        // dependecy injection
        // add data valadation with property params https://livewire.laravel.com/docs/forms#adding-validation

        // dd($request->all());
        // Works::Create($this->all());

        return redirect('/dashboard');
    }
    public function render()
    {
        return view('livewire.work-modal');
    }
}
