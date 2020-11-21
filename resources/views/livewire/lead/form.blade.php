@if (session()->has('message') || session()->has('leads_limitation'))
    <div class="alert alert-success">
        {{ session('message') }}
        {{ session('leads_limitation') }}
    </div>
@else
<x-jet-form-section submit="createLead">

    <x-slot name="title">
        {{ __('Create Lead') }}
    </x-slot>
    <x-slot name="description">
        {{ __('Fill this form and free manager would get in work your lead.') }}
    </x-slot>


    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="username" value="{{ __('Your username') }}" />
            <x-jet-input id="username" type="text" class="mt-1 block w-full" wire:model="username" autocomplete="username" />
            <x-jet-input-error for="username" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Your email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model="email" autocomplete="email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="subject" value="{{ __('Subject') }}" />
            <x-jet-input id="subject" type="text" class="mt-1 block w-full" wire:model="subject" autocomplete="subject" />
            <x-jet-input-error for="subject" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="description" value="{{ __('Description') }}" />
            <textarea class="form-input rounded-md shadow-sm mt-1" style="width: 100%" id="description" wire:model="description" autocomplete="description"></textarea>
            <x-jet-input-error for="description" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="file" value="{{ __('Attach file') }}" />
            <x-jet-input id="file" type="file" class="mt-1 block w-full" wire:model="file"  />
            <x-jet-input-error for="file" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            {!! app('captcha')->display() !!}
            <x-jet-input-error for="g_recaptcha_response" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
@endif
