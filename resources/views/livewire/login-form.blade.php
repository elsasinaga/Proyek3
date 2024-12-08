<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <x-mary-card class="w-full max-w-md bg-white shadow-lg">

        <h2 class="text-center text-2xl font-bold text-black">Login</h2>
        <p class="text-center text-gray-400">Masuk ke Akun Anda untuk Melanjutkan</p>

        @if (session()->has('message'))
            <div class="bg-green-500 text-white text-center py-2 px-4 rounded my-3">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="bg-red-500 text-white text-center py-2 px-4 rounded my-3">
                {{ session('error') }}
            </div>
        @endif


        <form wire:submit.prevent="login">
            <div class="space-y-4 mt-8">
                {{-- Username Field --}}
                <x-mary-input label="Nama Pengguna" wire:model="username" placeholder="Masukkan Nama Pengguna"
                    :error="$errors->first('username')"
                    class="border-green-500 focus:border-blue-700 focus:ring-blue-500" />

                {{-- Password Field --}}
                <x-mary-input label="Password" class="border-green-500 focus:border-blue-700 focus:ring-blue-500"
                    wire:model="password" placeholder="Masukkan Password" :error="$errors->first('password')"
                    right-icon="o-eye" type="password"  clearable />

                {{-- Submit Button --}}
                <x-mary-button label="Login" class="w-full bg-green-500 hover:bg-green-700 text-white" type="submit"
                    spinner color="primary" />
            </div>
        </form>

        <div class="text-center mt-3">
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        </div>
    </x-mary-card>
</div>