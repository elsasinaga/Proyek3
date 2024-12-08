<div>
    <div class="mt-4">
        <x-tags 
            label="Tags" 
            wire:model="tags" 
            icon="o-home" 
            hint="Klik enter untuk membuat tag baru" 
        />
    </div>
    
    <ul>
        @foreach($tags as $tag)
            <li>{{ $tag }}</li>
        @endforeach
    </ul>
</div>
