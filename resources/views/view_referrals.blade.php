@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="card shadow-lg border-0">
            <div class="card-header text-white" style="background: linear-gradient(90deg, #ff0084, #ff4db8);">
                <h4 class="mb-0 text-center">My Referrals</h4>
            </div>

            <div class="card-body" style="font-size: 10px">
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
                                        <td>{{ $referral->email }}</td>
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
                                    <td colspan="3" class="fw-bold text-start">Total Commission:</td>
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
@endsection
