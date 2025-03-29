<div>


    <div class="container-fluid gap-3">
        <div class="row">
            <div class="col-md-8 d-flex flex-column gap-2">

                <div class="bg-white p-3 rounded shadow-sm d-flex gap-1">
                    <a href="{{ url()->previous() }}" class="bg-warning btn btn-sm text-white/20">Go Back</a>
                    <h5>
                        Awaiting Shipment
                    </h5>
                </div>

                <div class="bg-white p-4 shadow-sm">
                    <h5 class="my-3 mb-4">
                        <span class="text-success">1</span> package(s) containing <span
                            class="text-success">{{ count($productOrders) }}</span> item(s)
                    </h5>
                    @foreach ($productOrders as $productOrder)
                        <div class="mb-1">
                            <div class="card">
                                <h6 class="card-header">
                                    {{ $productOrder->title }}
                                </h6>
                                <div class="card-body d-flex justify-content-between">
                                    <div class="d-flex gap-2">
                                        <div style="width:4rem;"><img class="w-100"
                                                src="{{ asset('storage/' . $productOrder->image) }}" alt="">
                                        </div>

                                        <p>
                                        <address class="my-auto">
                                            <strong>Name:</strong><span class="font-medium">
                                                {{ $productOrder->title }}</span>
                                            <br />
                                            <span class="badge rounded-pill text-bg-primary">{{ $productOrder->category->name }}</span>
                                            
                                        </address>
                                        </p>
                                    </div>

                                    <p class="card-text">
                                        Price: <span class="font-medium"></span>
                                        ₱{{ number_format($productOrder->price, 2) }}
                                        X <span class="font-medium">{{ $productOrder->pivot->quantity }}</span>
                                    </p>

                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 rounded d-flex flex-column gap-2">
                <div class="rounded p-3 bg-white shadow-sm d-flex flex-column">
                    <h5>
                        Billing summary
                    </h5>
                    <hr>
                    <div class="">
                        <a class="btn ms-auto text-secondary p-0  mb-2" data-bs-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            See details
                        </a>
                        <div class="collapse mb-2" id="collapseExample">
                            <div class="card card-body">
                                Some placeholder content for the collapse component. This panel is hidden by default but
                                revealed when the user activates the relevant trigger.
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between"><strong>Total</strong>
                        <p>{{ $orderTotal }}</p>
                    </div>
                </div>
                <div class="flex-grow-1 rounded p-3 bg-white shadow-sm">
                    <h5 class="pb-3">
                        Customer Information
                    </h5>
                    <h6 class="d-flex gap-3 pb-2 text-sm"><strong>Name:</strong> {{$orderss->user->name}}</h6>
                    <h6 class="d-flex gap-3 pb-2 text-sm"><strong>Address:</strong> {{$orderss->user->address}}</h6>
                    <h6 class="d-flex gap-3 pb-2 text-sm"><strong>Phone:</strong> {{$orderss->user->phone}}</h6>
                </div>

            </div>
        </div>
    </div>



</div>
