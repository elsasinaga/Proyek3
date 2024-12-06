<div>
    <!-- Daftar LKPD -->
    <h2 class="text-lg font-bold">Daftar LKPD</h2>
    <ul>
        @foreach ($lkpd as $item)
            <li>
                <button
                    class="text-blue-500 hover:underline"
                    wire:click="selectLkpd({{ $item->id }})">
                    {{ $item->name }}
                </button>
            </li>
        @endforeach
    </ul>

    <!-- Detail LKPD -->
    @if ($detail)
        <div class="mt-4">
            <h3 class="text-lg font-bold">Detail LKPD</h3>
            <p><strong>Judul:</strong> {{ $detail->name }}</p>
            <p><strong>Pengguna:</strong> 
                {{ $detail->users->pluck('name')->join(', ') }}
            </p>
            <p><strong>Dibuat:</strong> {{ $detail->created_at->format('d-m-Y') }}</p>
        </div>
    @else
        <p class="text-gray-500 mt-4">Pilih salah satu LKPD untuk melihat detail.</p>
    @endif
</div>
