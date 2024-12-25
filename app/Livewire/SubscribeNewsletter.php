<?php

namespace App\Livewire;

use App\Models\Newsletter;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SubscribeNewsletter extends Component
{
//    #[Validate('required|email|unique:newsletters,email')]
    public $email;

    protected function rules(): array
    {
        return [
            'email' => ['required', 'email',
                Rule::unique('newsletters')->where(fn($query) => $query->where('subscribed', true)),
            ]
        ];
    }

    protected function messages(): array
    {
        return [
            'email.unique' => 'You are already subscribed to our newsletter.',
        ];
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View
    {
        return view('livewire.subscribe-newsletter');
    }

    public function submit(): void
    {
        $this->validate();
        Newsletter::query()->create(['email' => $this->email]);
        session()->flash('success', 'Thank you for subscribing to our newsletter.');
        $this->reset();
    }
}
