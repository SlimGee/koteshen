@extends('minimal')

@section('content')
    <section class="py-8 h-full antialiased bg-white md:py-16 dark:bg-gray-900">
        <div class="px-4 mx-auto max-w-4xl 2xl:px-0">
            <div class="mt-6 sm:mt-8 lg:flex lg:gap-12 lg:items-start xl:gap-16">
                <div class="flex-1 space-y-8 min-w-0">
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Complete checkout
                        </h3>
                    </div>

                    <div>
                        <form method="post" action="{{ route('redeem') }}">
                            @csrf
                            <x-form.label for="voucher" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Enter
                                a gift card, voucher or promotional code </x-form.label>
                            <div class="flex gap-4 items-start max-w-md">
                                <div class="w-full">
                                    <x-form.input type="text" id="voucher" name="promo" class="w-full" required />
                                </div>
                                <x-button type="submit">Apply</x-button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="p-5 mt-6 space-y-6 w-full rounded border sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
                    <div class="flow-root">
                        <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                            <dl class="flex gap-4 justify-between items-center py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">
                                    ${{ Number::format($cart->getItemsSubtotal(), 2) }}
                                </dd>
                            </dl>
                            @foreach ($cart->getActions() as $action)
                                <dl class="flex gap-4 justify-between items-center py-3">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                        {{ $action->get('title') }}</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">
                                        {{ Number::format($action->get('amount'), 2) }}
                                    </dd>
                                </dl>
                            @endforeach

                            <dl class="flex gap-4 justify-between items-center py-3">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">
                                    ${{ Number::format($cart->getTotal(), 2) }}</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <form method="post" data-turbo="false" method="{{ route('checkout.store') }}">
                            @csrf
                            <x-button type="submit" class="justify-center w-full">
                                Continue to Payment
                            </x-button>
                        </form>

                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            You will be redirected to payment page
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
