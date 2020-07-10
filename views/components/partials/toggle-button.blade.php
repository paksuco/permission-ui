<div>
    @if($state)
    <i wire:key="toggle-button-{{implode("-", $arguments)}}-on" wire:loading.class.remove="fa-check cursor-pointer" wire:loading.class="cursor-wait fa-hourglass-half"
       class="bg-green-500 shadow-sm subpixel-antialiased p-2 rounded-lg fas fa-check text-lg font-bold text-white cursor-pointer"
       wire:click="runCallback"></i>
    @else
    <i wire:key="toggle-button-{{implode("-", $arguments)}}-off" wire:loading.class.remove="fa-ban cursor-pointer" wire:loading.class="cursor-wait fa-hourglass-half"
       class="bg-red-600 shadow-sm subpixel-antialiased p-2 rounded-lg fas fa-ban text-lg font-bold text-white cursor-pointer"
       wire:click="runCallback"></i>
    @endif
</div>
