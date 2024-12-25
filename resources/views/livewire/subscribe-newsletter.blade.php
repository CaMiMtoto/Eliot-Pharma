<section class="tw-bg-[#F1F3F5] py-5">
    <div class="container text-center">
        <h3>Sign Up For Newsletter</h3>
        <p>
            Please enter your email address to receive our latest updates.
        </p>
       @if(session()->has('success'))
           <div class="alert alert-success">
               <x-lucide-check-circle-2 class="tw-w-5 tw-h-5 tw-inline mr-1"/>
               {{ session('success') }}
           </div>
       @endif
        <form wire:submit="submit" autocomplete="off">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-6 mx-auto">

                    <div
                        class="bg-white rounded-pill position-relative d-flex flex-column lg:tw-flex-row gap-2shadow-sm">
                        <input type="text" wire:model="email" autocomplete="off"
                               class="shadow-none tw-outline-none form-control form-control-lg border-0 bg-transparent tw-text-sm px-4 py-3"
                               placeholder="Your email address"/>
                        <button type="submit" wire:loading.attr="disabled"
                                class="btn btn-primary d-inline-flex justify-content-center tw-rounded-t-none tw-rounded-b-full lg:tw-rounded-full align-items-center gap-1 text-uppercase btn-lg top-0 text-white tw-text-sm px-4 end-0 tw-tracking-wider">
                            Subscribe
                            <x-lucide-loader-circle wire:loading class="tw-h-5 tw-w-5 tw-ml-2 tw-animate-spin"/>
                        </button>
                    </div>
                    @error('email') <span class="text-danger mt-2 d-block text-center small">{{ $message }}</span> @enderror
                </div>
            </div>

        </form>
    </div>
</section>
