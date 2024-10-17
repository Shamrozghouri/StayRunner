<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stay Runners - high service low price</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('pngtree-s-logo-icon-png-image_9171884.png') }}">

    <meta name="description" content="Find any Product in affordable prices in seconds">
    <meta property="og:title" content="Stay Runners - high service low price">
    <meta property="og:description" content="Find any Product in affordable prices in seconds">
    <meta property="og:image" content="https://amarone.company/thumbnail.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:creator" content="@joshtriedcoding">
    <meta name="twitter:title" content="Stay Runners - high service low price">
    <meta name="twitter:description" content="Find any Product in affordable prices in seconds">
    <meta name="twitter:image" content="https://amarone.company/thumbnail.png">
    <link rel="icon" href="/favicon.ico" type="image/x-icon" sizes="16x16">
</head>
<body class="__className_418f75">
    <nav class="sticky z-[100] h-20 inset-x-0 top-0 w-full border-b border-gray-200 bg-white/75 backdrop-blur-lg transition-all">
        <div class="h-full mx-auto w-full max-w-screen-xl px-2.5 md:px-20">
            <div class="flex h-20 items-center justify-between border-b border-zinc-200">
                <a class="flex z-40 font-semibold text-xl">Stay Runners <span class="text-blue-500 ml-2">Official</span></a>
                @if (Route::has('login'))
                <div class="h-full flex items-center space-x-4">
                    @auth

                    <a href="{{ url('/') }}" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 rounded-md px-8 font-bold">Home</a>
                    <div class="h-8 w-px bg-zinc-200 hidden sm:block"></div>

                    @if (Route::has('login'))
                    <a href="@auth {{ url('/dashboard') }} @else {{ route('register') }} @endauth" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm text-white font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-blue-500 text-primary-foreground shadow hover:bg-primary/90 h-8 rounded-md px-3 text-xs sm:flex items-center bg-blue-500 gap-1">Dashboard</a>
                    @endif
                    @else
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 rounded-md px-8 font-bold">Login</a>
                    <div class="h-8 w-px bg-zinc-200 hidden sm:block"></div>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 text-white bg-blue-500 text-primary-foreground shadow hover:bg-primary/90 h-8 rounded-md px-3 text-xs hidden sm:flex items-center gap-1">Become a Runner</a>
                    @endif
                    @endauth
                    @endif

                </div>
            </div>
        </div>
    </nav>
    <main class="flex grainy-light flex-col min-h-[calc(100vh-3.5rem-1px)]">
        <div class="flex-1 flex flex-col h-full">
            <div class="bg-slate-50 grainy-light">
                <section>
                    <div class="h-full mx-auto w-full max-w-screen-xl px-2.5 md:px-20 pb-24 pt-10 lg:grid lg:grid-cols-3 sm:pb-32 lg:gap-x-0 xl:gap-x-8 lg:pt-1 xl:pt-1 lg:pb-52">
                        <div class="col-span-2 px-6 lg:px-0 lg:pt-4">
                            <div class="relative mx-auto text-center lg:text-left flex flex-col items-center lg:items-start">
                                <h1 class="relative w-fit tracking-tight text-balance mt-16 font-bold !leading-tight text-gray-900 text-2xl md:text-3xl lg:text-4xl">Delivery <span class="bg-blue-500 px-2 text-white">Request</span> through StayRunners</h1>
                                <p class="mt-8 text-lg lg:pr-10 max-w-prose text-center lg:text-left text-balance md:text-wrap">Submit your delivery request with details such as delivery address, name, phone number, email, special instructions, product details, and total bid price. <span class="font-semibold">Get the best rates </span><br><br><span class="font-semibold">Get notifications</span> and engage in negotiations with local runners through our AI Bot until a deal is reached.</p>
                                <ul class="mt-8 space-y-2 text-left font-medium flex flex-col items-center sm:items-start">
                                    <div class="space-y-2">
                                        <li class="flex gap-1.5 items-center text-left"><svg xmlns="http://www.w3 .org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 shrink-0 text-blue-500"><path d="M20 6 9 17l-5-5"></path></svg>Easy Delivery Requests</li>
                                        <li class="flex gap-1.5 items-center text-left"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 shrink-0 text-blue-500"><path d="M20 6 9 17l-5-5"></path></svg>Negotiation with AI Bot</li>
                                        <li class="flex gap-1.5 items-center text-left"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-5 w-5 shrink-0 text-blue-500"><path d="M20 6 9 17l-5-5"></path></svg>Secure Payments and Fees</li>
                                    </div>
                                </ul>
                                <div class="mt-20 flex flex-col sm:flex-row items-center sm:items-start gap-5">
                                    @if (Route::has('login'))
                                    <div class="flex flex-col justify-between items-center md:items-start">
                                        <a href="@auth {{ url('/dashboard') }} @else {{ route('register') }} @endauth" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm text-white font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-blue-500 text-primary-foreground shadow hover:bg-primary/90 h-8 rounded-md px-3 text-xs sm:flex items-center bg-blue-500 gap-1">Sign Up as a Runner</a>
                                        @endif
                                        <p class="text-xs mt-4">Join our community of dedicated runners</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-2 lg:col-span-1 w-full flex justify-center px-8 sm:px-16 md:px-0 mt-32 lg:mx-0 lg:mt-20 h-fit">
                            <div class="relative w-full md:max-w-xl">
                                <div class="w-full col-span-full lg:col-span-1 flex flex-col bg-white shadow-md">
                                    <div dir="ltr" class="relative flex-1 overflow-auto">
                                        <style>[data-radix-scroll-area-viewport]{scrollbar-width:none;-ms-overflow-style:none;-webkit-overflow-scrolling:touch;}[data-radix-scroll-area-viewport]::-webkit-scrollbar{display:none}</style>
                                        <div data-radix-scroll-area-viewport="" class="h-full w-full rounded-[inherit]" style="overflow: hidden scroll;">
                                            <div style="min-width:100%;display:table">
                                                <div aria-hidden="true" class="absolute z-10 inset-x-0 bottom-0 h-12 bg-gradient-to-t from-white pointer-events-none"></div>
                                                <div class="px-8 pb-12 pt-8">
                                                    <h2 class="tracking-tight font-bold text-3xl">Sign Up to Start</h2>
                                                    <div class="w-full h-px bg-zinc-200 my-6"></div>
                                                    <div class="relative mt-4 h-full flex flex-col justify-between">
                                                        <div class="flex flex-col gap-6">

                                                            <form method="POST" action="{{ route('register') }}">
                                                                @csrf

                                                                <!-- Name -->
                                                                <div>
                                                                    <x-input-label for="name" :value="__('Name')" />
                                                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                                </div>

                                                                <!-- Email Address -->
                                                                <div class="mt-4">
                                                                    <x-input-label for="email" :value="__('Email')" />
                                                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                                </div>

                                                                <!-- Password -->
                                                                <div class="mt-4">
                                                                    <x-input-label for="password" :value="__('Password')" />

                                                                    <x-text-input id="password" class="block mt-1 w-full"
                                                                                    type="password"
                                                                                    name="password"
                                                                                    required autocomplete="new-password" />

                                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                                </div>

                                                                <!-- Confirm Password -->
                                                                <div class="mt-4">
                                                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                                                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                                                    type="password"
                                                                                    name="password_confirmation" required autocomplete="new-password" />

                                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                                </div>

                                                                 <!-- User Role -->
                                                                 <div class="mt-4">
                                                                    <x-input-label for="role" :value="__('Role')" />
                                                                    <select id="role" name="role" class="block mt-1 w-full">
                                                                        <option value="buyer">Buyer</option>
                                                                        <option value="seller">Seller (Friend with Fridge)</option>
                                                                        <option value="runner">Runner</option>
                                                                    </select>
                                                                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                                                </div>

                                                                <div class="flex items-center justify-end mt-4">
                                                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                                                        {{ __('Already registered?') }}
                                                                    </a>

                                                                    <x-primary-button class="ms-4">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 h-4 w-4"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg> {{ __('Register') }}
                                                                    </x-primary-button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
    <footer class="bg-white h-20 relative">
        <div class="h-full mx-auto w-full max-w-screen-xl px-2.5 md:px-20">
            <div class="border-t border-gray-200"></div>
            <div class="h-full flex flex-col md:flex-row md:justify-between justify-center items-center">
                <div class="text-center md:text-left pb-2 md:pb-0">
                    <p class="text-sm text-muted-foreground"> 2024 All rights reserved</p>
                </div>
                <div class="flex items-center justify-center">
                    <div class="flex space-x-8">
                        <a class="text-sm text-muted-foreground hover:text-gray-600">Terms</a>
                        <a class="text-sm text-muted-foreground hover:text-gray-600">Privacy Policy</a>
                        <a class="text-sm text-muted-foreground hover:text-gray-600">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
