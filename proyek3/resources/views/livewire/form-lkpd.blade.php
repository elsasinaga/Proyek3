<div>
  <h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>

  <!-- Komponen Step dengan warna yang ditentukan -->
  <x-steps wire:model="example" steps-color="step-warning">
    <x-step step="1" text="A" :data-content="$example == 1 ? '✓' : ''" />
    <x-step step="2" text="B" :data-content="$example == 2 ? '✓' : ''" />
    <x-step step="3" text="C" :data-content="$example == 3 ? '✓' : ''" step-classes="!step-success" />
  </x-steps>

  <hr class="my-5" />

  <!-- Tombol untuk pindah langkah -->
  <x-button label="Previous" wire:click="prev2" :disabled="$example == 1" />
  <x-button label="Next" wire:click="next2" :disabled="$example == 3" />
</div>
