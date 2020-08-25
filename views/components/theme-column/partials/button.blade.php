<div class="rounded-md bg-cool-gray-200 p-1">
    <i class="subpixel-antialiased rounded-full fa text-base font-bold text-white cursor-pointer p-2 my-2
        @if($status) bg-green-500 fa-check @else bg-red-600 fa-ban @endif "
        wire:key='getKey()' wire:click="togglePermission()">
    </i>
</div>
