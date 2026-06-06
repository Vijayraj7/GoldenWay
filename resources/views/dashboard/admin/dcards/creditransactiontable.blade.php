<div class="card">
    @php
        $i = 0;
    @endphp
    <h5 style="padding: 1.125rem 1.25rem !important;" class="card-header">Transfer Credit Transactions</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Receiver Name</th>
                    <th>Amount & Source</th>
                    <!-- <th>Amount</th> -->
                    <!-- <th>Link</th> -->
                    <!-- <th>Users</th> -->
                    <!-- <th>Status</th> -->
                    <!-- <th>Actions</th> -->
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($tplans as $transaction)
                    @php
                        $i++;
                        $usr = DB::table('customers')
                            ->where('id', $transaction->csId)
                            ->first();
                    @endphp
                    @if ($usr != null)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>
                                {{ date('d, M, Y h:i a', strtotime($transaction->created_at)) }}
                            </td>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    @if ($usr->img != null)
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="{{ $usr->name }}">
                                            <img src="{{ $usr->img }}" alt="Avatar" class="rounded-circle">
                                        </li>
                                    @endif
                                    <a href="/admin/user/{{ $usr->id }}">
                                        {{ $usr->name }}
                                    </a>
                                </ul>
                            </td>
                            <td>
                                @if ($transaction->wStatus == '1')
                                    <span style="color: red !important;">
                                        {{ number_format($transaction->tAmount, 2) }}
                                    </span>
                                @else
                                    <span style="color: rgb(20, 190, 20) !important;">
                                        +{{ number_format($transaction->tAmount, 2) }} USDT
                                    </span>
                                @endif
                                <br>
                                {{ getPname($transaction->tType) }}
                                @if ($transaction->planId != null)
                                    <a href="/admin/product/requests?plnid={{ $transaction->planId }}">
                                        @php
                                            $plndtls = DB::table('customer_plans')
                                                ->where('id', $transaction->planId)
                                                ->first();
                                            $plnusr = DB::table('customers')
                                                ->where('id', $plndtls->csId)
                                                ->first();
                                        @endphp
                                        <br>
                                        Plan
                                        <span style="color: grey;">{{ getPname($plndtls->pname) }}</span>
                                        <br>
                                        <span style="color: grey;">{{ $plnusr->name }}</span>
                                        <span style="color: black;">{{ $plndtls->pamount }} USDT</span>
                                    </a>
                                @endif

                                @if ($transaction->wthId != null)
                                    <a style="color: purple;"
                                        href="/admin/withdraw/requests?wthid={{ $transaction->wthId }}">
                                        <br>
                                        View
                                    </a>
                                @endif
                            </td>
                            <!-- <td></td> -->
                            <!-- <td>
                        @if ($transaction->wStatus == '0')
<span class="badge bg-label-success me-1">Credit</span>
@endif
                        @if ($transaction->wStatus == '1')
<span class="badge bg-label-danger me-1">Debit</span>
@endif
                    </td> -->
                            <!-- <td>
                        <div class="dropdown">

                            <a
                                class="dropdown-item"
                                style="padding: 0 !important;"
                                href="/dashboard"><i
                                    class="bx bxs-contact me-1"></i>
                                View</a>

                        </div>
                    </td> -->
                        </tr>
                    @endif
                @endforeach


                <?php
                // $credited = $tplans->where('wStatus','0')->sum('tAmount');
                // $debited = $tplans->where('wStatus','1')->sum('tAmount')+DB::table('customer_transfers')->whereNotNull('planId')->where('tType','creditadd')->get()->sum('tAmount');
                // $balance = $tplans->where('wStatus','0')->sum('tAmount') - $tplans->sum('tAmount') + DB::table('customer_transfers')->whereNotNull('planId')->where('tType','creditadd')->get()->sum('tAmount');
                
                $credited = $tplans->where('wStatus', '0')->sum('tAmount');
                if (isset($tcsId)) {
                    $debited = $tplans->where('wStatus', '1')->sum('tAmount') * -1;
                } else {
                    $debited = $tplans->where('wStatus', '1')->sum('tAmount') * -1 - DB::table('customer_transfers')->whereNotNull('planId')->where('tType', 'creditadd')->where('wStatus', '0')->get()->sum('tAmount');
                }
                $balance = $credited - $debited;
                
                // $credited = DB::table('customer_transactions',);
                // $debited = $tplans->where('wStatus','1')->sum('tAmount')+DB::table('customer_transfers')->whereNotNull('planId')->where('tType','creditadd')->get()->sum('tAmount');
                // $balance = $tplans->where('wStatus','0')->sum('tAmount') - $tplans->sum('tAmount') + DB::table('customer_transfers')->whereNotNull('planId')->where('tType','creditadd')->get()->sum('tAmount');
                
                ?>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="color: green;">Credited - </td>
                    <td style="color: green;">{{ number_format($credited, 2) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="color: red;">Debited -</td>
                    <td style="color: red;">{{ number_format($debited, 2) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="color: darkgoldenrod;">Add fund -</td>
                    <td style="color: darkgoldenrod;">
                        {{ number_format(DB::table('customer_transfers')->whereNotNull('planId')->where('tType', 'creditadd')->where('wStatus', '0')->get()->sum('tAmount'), 2) }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="color: blue;">Balance -</td>
                    <td style="color: blue;">{{ number_format($balance, 2) }}</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
