<footer {{ $attributes->class(['tw-text-sm tw-font-medium bg-light border-top pt-4']) }}>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <img src="{{ asset('assets/media/logos/logo-sm.jpg') }}" alt="Logo" class="tw-h-10"/>
                <div class="text-primary-emphasis fw-semibold">EliotPharma</div>
                <p class="text-muted mt-2 tw-text-sm tw-tracking-wide tw-leading-relaxed">
                    Providing trusted healthcare solutions for you and your family. Shop the best prescription
                    medicines, supplements, and health products at affordable prices.
                </p>
            </div>
            <div class="col-md-6 col-lg-4">
                <h5 class="text-primary-emphasis text-uppercase tw-tracking-wide fw-semibold">
                    Working Hours
                </h5>
                <ul class="tw-list-disc py-1 ps-2">
                    @foreach($working_days as $day)
                        <li class="tw-text-sm bg-transparent text-muted tw-leading-relaxed py-1">{{ $day->day }}
                            ({{ date('h:i A', strtotime($day->opening_time))}}
                            - {{ date('h:i A', strtotime($day->closing_time))}})
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6 col-lg-4">
                <h5 class="text-primary-emphasis text-uppercase tw-tracking-wide fw-semibold">
                    Contact Information
                </h5>
                <p>
                    <x-lucide-map-pin class="text-primary tw-inline-block tw-mr-1 tw-h-5"/>
                    Kigali-Rwanda Nyarugenge City MarketDoor NO GF-59
                </p>
                <p>
                    <x-lucide-map-pinned class="text-primary tw-inline-block tw-mr-1 tw-h-5"/>
                    P.O.Box 7425,
                </p>
                <p>
                    <a href="mailto:eliotpharma@gmail.com">
                        <x-lucide-mail class="text-primary tw-inline-block tw-mr-1 tw-h-5"/>
                        <span class="text-dark">eliotpharma@gmail.com</span>
                    </a>
                </p>
                <p>
                    <a href="mailto:+250 788 308 557">
                        <x-lucide-phone-call class="text-primary tw-inline-block tw-mr-1 tw-h-5"/>
                        <span class="text-dark">+250 788 308 557</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <section class="bg-primary tw-p-4  tw-text-gray-100 ">
        <div class="container d-flex flex-column gap-2 flex-lg-row justify-content-between align-items-center">
            <div class="d-flex gap-2">
                <span>Follow Us</span>
                <x-lucide-instagram class="tw-h-5 tw-w-5"/>
                <x-lucide-facebook class="tw-h-5 tw-w-5"/>
                <x-lucide-twitter class="tw-h-5 tw-w-5"/>
            </div>
            <div>
                <p class="tw-text-gray-100 tw-text-center mb-0">
                    &copy; {{ date('Y') }} Eliot Pharma
                </p>
            </div>
        </div>
    </section>
</footer>
