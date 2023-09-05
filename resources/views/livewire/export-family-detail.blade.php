<div>
    <form wire:submit="create">
        {{ $this->form }}

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
            Submit
        </button>
    </form>

    <x-filament-actions::modals />
</div>
