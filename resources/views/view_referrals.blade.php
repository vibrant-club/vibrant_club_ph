@extends('layouts.app')

@section('content')
    <div class="container my-4 mb-2">
        <div class="card shadow-lg border-0">
            <div class="card-header text-white" style="background: linear-gradient(90deg, #ff0084, #ff4db8);">
                <h5 class="mb-0 text-center">MY REFERRALS</h5>
            </div>

            <div class="card-body" style="font-size: 11px">
                @if ($referrals->isEmpty())
                    <div class="alert alert-info text-center">
                        No referrals yet. Start sharing your referral link!
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="width: 100%">
                            <thead class="">
                                <tr>
                                    <th>No.</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Sub. Plan</th>
                                    <th>Commission</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalCommission = 0;
                                @endphp

                                @foreach ($referrals as $referral)
                                    @php
                                        $totalCommission += $referral->commission;
                                    @endphp

                                    <tr>
                                        <td>{{ $referral->seq }}</td>
                                        <td>
                                            @php
                                                $email = $referral->email;
                                                $maskedEmail = preg_replace('/(^.).*(@.*)/', '$1***$2', $email);
                                            @endphp
                                            {{ $maskedEmail }}
                                        </td>
                                        <td>
                                            @if ($referral->username)
                                                <a href="https://vibrant-club.com/username/{{ $referral->username }}"
                                                    target="_blank">
                                                    {{ $referral->username }}
                                                </a>
                                            @else
                                                <span class="text-muted">no_username</span>
                                            @endif
                                        </td>



                                        <td class="text-nowrap">
                                            @if ($referral->subscription_plan == 0)
                                                Lifetime
                                            @else
                                                {{ $referral->subscription_plan }}
                                                {{ $referral->subscription_plan > 1 ? 'months' : 'month' }}
                                            @endif
                                        </td>
                                        <td class="fw-bold text-success">
                                            ₱{{ number_format($referral->commission, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="table-secondary">
                                    <td colspan="4" class="fw-bold text-start">Total Commission:</td>
                                    <td class="fw-bold text-primary">
                                        ₱{{ number_format($totalCommission, 2) }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container my-4 mb-2">
        <div class="card shadow-lg border-0">
            <div class="card-header text-white" style="background: linear-gradient(90deg, #ff0084, #ff4db8);">
                <h5 class="mb-0 text-center">PAYOUT DETAILS</h5>
            </div>

            <div class="card-body" style="font-size: 11px">
                <form action="{{ route('update.gcash') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="gcash_name" class="form-label fw-bold">GCash Name</label>
                        <input type="text" name="gcash_name" id="gcash_name" class="form-control form-control-sm"
                            value="{{ old('gcash_name', Auth::user()->gcash_name) }}"
                            placeholder="Enter your GCash registered name" required>
                    </div>

                    <div class="mb-3">
                        <label for="gcash_number" class="form-label fw-bold">GCash Number</label>
                        <input type="text" name="gcash_number" id="gcash_number" class="form-control form-control-sm"
                            value="{{ old('gcash_number', Auth::user()->gcash_number) }}" placeholder="09XXXXXXXXX"
                            required>
                    </div>

                    {{-- Payout Note --}}
                    <div class="alert alert-warning small text-center mb-3" role="alert">
                        ⚠️ Please be advised that payout is processed and deliver every <strong>last day of the
                            month</strong>.
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-sm px-4 text-white"
                            style="background-color:#ff0084; border-color:#ff0084;">
                            Update
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
