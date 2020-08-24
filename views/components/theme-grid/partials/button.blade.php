<div>
    <i class="subpixel-antialiased p-2 rounded-lg fa text-lg font-bold text-white cursor-pointer
        @if($status) bg-green-500 fa fa-check @else bg-red-600 fa fa-ban @endif "
        wire:key='getKey()' wire:click="togglePermission()">
    </i>
</div>
