<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <x-mary-card class="w-full max-w-md bg-white shadow-lg">

        <h2 class="text-center text-2xl font-bold text-black">Registrasi LKPD</h2>
        <p class="text-center text-gray-400">Mudah, Cepat, Interaktif: LKPD Digital untuk Pembelajaran Berkualitas</p>

        @if (session()->has('message'))
            <div class="bg-green-500 text-white text-center py-2 px-4 rounded my-3">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="register">
            <div class="space-y-4 mt-8">
                {{-- Name Field --}}
                <x-mary-input class="border-green-500 focus:border-green-700 focus:ring-green-500" label="Nama Lengkap"
                    wire:model="name" placeholder="Nama Lengkap" :error="$errors->first('name')" />

                {{-- Username Field --}}
                <x-mary-input class="border-green-500 focus:border-green-700 focus:ring-green-500" label="Nama Pengguna"
                    wire:model="username" placeholder="username" :error="$errors->first('username')" />

                {{-- Email Field --}}
                <x-mary-input type="email" label="Email" wire:model="email" placeholder="email"
                    :error="$errors->first('email')"
                    class="border-green-500 focus:border-blue-700 focus:ring-blue-500" />

                {{-- Password Field --}}
                <x-mary-input label="Password" class="border-green-500 focus:border-blue-700 focus:ring-blue-500"
                    wire:model="password" placeholder="Password" :error="$errors->first('password')" right-icon="o-eye"
                    type="password" clearable />

                <x-mary-input label="Confirm Password" class="border-green-500 focus:border-blue-700 focus:ring-blue-500"
                    wire:model="password_confirmation" placeholder="Confirm Password"
                    :error="$errors->first('password_confirmation')" right-icon="o-eye"
                    type="password" clearable />

                {{-- Submit Button --}}
                <x-mary-button label="Registrasi" class="w-full bg-green-500 hover:bg-green-600 text-white"
                    type="submit" spinner color="success" />
            </div>
        </form>

        <div class="text-center mt-3">
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </div>
    </x-mary-card>
</div>