<div class="card" style="margin-bottom: 40px !important;">
    <h5 style="padding: 1.125rem 1.25rem !important;" class="card-header">Compounds</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Package</th>
                    <th>Amount</th>
                    <!-- <th>Users</th> -->
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($cmpdplans as $plan)
                @php
        $i++;
$usr =
DB::table('customers')->where('id', $plan->csId)->first();
                @endphp
                <tr>
                    <td>{{$i}}</td>
                    <td>
                        {{
date(
'd, M, Y h:i a',
strtotime($plan->created_at)
)
                        }}
                    </td>
                    <td>
                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            @if($usr->img != null)
                            <li
                                data-bs-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-bs-placement="top"
                                class="avatar avatar-xs pull-up"
                                title="{{$usr->name}}"
                            >
                                <img src="{{$usr->img}}" alt="Avatar" class="rounded-circle">
                            </li>
                            @endif
                            <a href="/admin/user/{{$usr->id}}">
                                {{ $usr->name }}
                            </a>
                        </ul>
                    </td>
                    <td>
                        {{ getPname($plan->pname) }}
                    </td>
                    <td>
                        @php
                        $cplan = DB::table('customer_plans')->where('id',$plan->cmpId)->first();
                        @endphp
                        <a style="color: black;" href="/admin/product/requests/?plnid={{$cplan->id}}">
                            USDT {{ number_format($plan->pamount,2) }}
                        </a>
                        @if($plan->cmpId != null && $plan->cmpId != '0')
                        <br>
                        Compound of
                        <br>
                        <a style="color: blue;" href="/admin/product/requests/?plnid={{$cplan->id}}">
                            Plan USDT {{ number_format($cplan->pamount,2) }}
                        </a>
                        @endif
                    </td>
                    <td>
                        @if ($plan->pstatus == '0')
                        <span class="badge bg-label-warning me-1">Pending</span>
                        @elseif ($plan->pstatus == '1')
                        <span class="badge bg-label-success me-1">Credit</span>
                        @elseif ($plan->pstatus == '3')
                        <span class="badge bg-label-danger me-1">Rejected</span>
                        @endif
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <span style="color: red;">Total -</span>
                    </td>
                    <td>
                        <span style="color: red;">{{number_format($cmpdplans->sum('pamount'),2)}} USDT</span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
