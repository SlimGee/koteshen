@extends('admin')

@section('content')
    <div class="container mx-auto">
        <div>
            <div class="p-5 bg-white rounded border shadow-sm">
                <div class="flex items-center space-x-2">
                    <div><x-secondary-button>Back</x-secondary-button></div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-800">Promo codes</h1>
                    </div>
                </div>

            </div>
        </div>
        <div>
            <form action="{{ route('admin.promo-codes.store') }}" method="post">
                @csrf
                <div class="py-10 px-4 w-5/12 sm:px-6 lg:py-6 lg:px-8">
                    <!-- Card -->
                    <div class="p-4 bg-white rounded border shadow-sm sm:p-7 dark:bg-neutral-900">

                        <div class="mb-4">
                            <x-form.label>Count</x-form.label>
                            <x-form.input name="count" class="mt-1 w-full" :value="1" />
                        </div>

                        <div class="mb-4">
                            <x-form.label>Percent OFF</x-form.label>
                            <x-form.input name="percent" class="mt-1 w-full" :value="50" />
                        </div>
                        <div class="">
                            <x-button type="submit">Create promo codes</x-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
