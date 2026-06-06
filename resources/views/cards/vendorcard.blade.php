<div class="container bcontent">
    @if(count($alv) > 1)
    <h2>Vendors</h2>
    <hr />
    @endif
    @foreach($alv as $av)
    <div class="card nvcon">
        <div class="row no-gutters">
            <div class="col-sm-5">
                <img class="card-img" src="{{$av->img ?? '/assets/img/avatars/1.png'}}" alt="Suresh Dasari Card">
            </div>
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title">{{$av->name}}</h5>
                    <p class="card-text" style="margin: 0 0 5px !important;">{{$av->email}}</p>
                    <p class="card-text" style="margin: 0 0 5px !important;">{{$av->phone}}</p>
                    <p class="card-text" style="margin: 0 0 5px !important;">{{$av->country}}</p>
                    <p class="card-text" style="margin: 0 0 5px !important;">{{$av->address}}</p>
                    <a href="/vendor/{{$av->id}}" class="btn btn-primary">View Profile</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<style>
    .bcontent {
        margin-left: 75px !important;
    }

    .nvcon {
        width: 700px;
        margin-top: 20px;
    }

    @media(max-width:500px) {
        .bcontent {
            margin-left: auto !important;
        }

        .nvcon {
            width: 400px;
        }
    }

    @media(max-width:800px) {
        .bcontent {
            margin-left: auto !important;
        }

        .nvcon {
            width: 400px;
        }
    }

    @media(max-width:600px) {
        .bcontent {
            margin-left: auto !important;
        }

        .nvcon {
            width: 400px;
        }
    }
</style>