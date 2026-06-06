<form class="form">
    <div class="column">
        <div class="input-box">
            <label>Factory Name : </label>
            <span>{{ $pv->factoryname ?? '' }}</span>
        </div>

        <div class="input-box">
            <label>Factory Address : </label>
            <span>{{ $pv->factoryaddress ?? '' }}</span>
        </div>
    </div>

    <div class="input-box">
        <label>Company Website : </label>
        <span>{{ $pv->companywebsite ?? '' }}</span>
    </div>

    <div class="input-box">
        <label>Approval No : </label>
        <span>{{ $pv->approvalno ?? '' }}</span>
    </div>

    <div class="input-box">
        <label>Factory Shareholder(s) : </label>
        <span>{{ $pv->fshares ?? '' }}</span>
    </div>

    <div class="gender-box">
        <h3>Supplier and factory relationship</h3>
        <div class="gender-option">
            <div class="gender">
                <input @if(in_array("Agent / Trading company", $pv->sfrelation ?? [])) checked @endif type="checkbox"
                id="check-male" value="Agent / Trading company" />
                <label for="check-male">Agent / Trading company : </label>
            </div>
            <div class="gender">
                <input @if(in_array("Own Factory", $pv->sfrelation ?? [])) checked @endif type="checkbox" value="Own
                Factory" id="check-female" />
                <label for="check-female">Own Factory : </label>
            </div>
            <div class="gender">
                <input @if(in_array("Joint venture", $pv->sfrelation ?? [])) checked @endif type="checkbox"
                id="check-other" value="Joint venture" />
                <label for="check-other">Joint venture : </label>
            </div>
        </div>
    </div>

    <div class="input-box">
        <label>Main Contact person : </label>
        <span>{{ $pv->mainperson ?? '' }}</span>
    </div>

    <div class="input-box">
        <label>Main Person - Position : </label>
        <span>{{ $pv->mainpersonpos ?? '' }}</span>
    </div>

    <div class="input-box">
        <label>Main Person - Mobile Number : </label>
        <span>{{ $pv->mainpersonph ?? '' }}</span>
    </div>

    <div class="input-box">
        <label>Main Person - Email : </label>
        <span>{{ $pv->mainpersonem ?? '' }}</span>
    </div>

    <div class="input-box">
        <label>Year - Founded : </label>
        <span>{{ $pv->yearfound ?? '' }}</span>
    </div>

    <div class="input-box">
        <label>No. of Buldings for production : : </label>
        <span>{{ $pv->nofbuild ?? '' }}</span>
    </div>

    <div class="input-box">
        <label>No. of Lines : : </label>
        <span>{{ $pv->noflines ?? '' }}</span>
    </div>

    <div class="input-box">
        <label>Capacity in Full : </label>
        <span>{{ $pv->capinfull ?? '' }}</span>
    </div>

    <div class="input-box">
        <label>Capacity on Average : </label>
        <span>{{ $pv->capinavg ?? '' }}</span>
    </div>

    <div class="input-box">
        <label>Annual turnover (INR) : </label>
        <span>{{ $pv->annualturn ?? '' }}</span>
    </div>

    <div class="gender-box">
        <h3>Food Safety (tick appropriate)</h3>
        <div class="gender-option">
            <div class="gender">
                <input @if(in_array("BRC", $pv->foodsafety ?? [])) checked @endif type="checkbox" id="check-male"
                value="BRC" />
                <label for="check-male">BRC : </label>
            </div>
            <div class="gender">
                <input @if(in_array("FSSAI", $pv->foodsafety ?? [])) checked @endif type="checkbox" value="FSSAI"
                id="check-female" />
                <label for="check-female">FSSAI : </label>
            </div>
            <div class="gender">
                <input @if(in_array("FSSC22000", $pv->foodsafety ?? [])) checked @endif type="checkbox" id="check-other"
                value="FSSC22000" />
                <label for="check-other">FSSC22000 : </label>
            </div>
            <div class="gender">
                <input @if(in_array("Others HACCP", $pv->foodsafety ?? [])) checked @endif type="checkbox"
                id="check-other" value="Others HACCP" />
                <label for="check-other">Others HACCP : </label>
            </div>
        </div>
    </div>

    <div class="gender-box">
        <h3>Social Compliance</h3>
        <div class="gender-option">
            <div class="gender">
                <input @if(in_array("BSCI", $pv->socompliance ?? [])) checked @endif type="checkbox" id="check-male"
                value="BSCI" />
                <label for="check-male">BSCI : </label>
            </div>
            <div class="gender">
                <input @if(in_array("SA8000", $pv->socompliance ?? [])) checked @endif type="checkbox" value="SA8000"
                id="check-female" />
                <label for="check-female">SA8000 : </label>
            </div>
            <div class="gender">
                <input @if(in_array("SEDEX", $pv->socompliance ?? [])) checked @endif type="checkbox" id="check-other"
                value="SEDEX" />
                <label for="check-other">SEDEX : </label>
            </div>
            <div class="gender">
                <input @if(in_array("Others", $pv->socompliance ?? [])) checked @endif type="checkbox" id="check-other"
                value="Others" />
                <label for="check-other">Others : </label>
            </div>
        </div>
    </div>

    <div class="gender-box">
        <h3>Sustainability</h3>
        <div class="gender-option">
            <div class="gender">
                <input @if(in_array("BAP", $pv->sustainability ?? [])) checked @endif type="checkbox" id="check-male"
                value="BAP" />
                <label for="check-male">BAP : </label>
            </div>
            <div class="gender">
                <input @if(in_array("ASC", $pv->sustainability ?? [])) checked @endif type="checkbox" value="ASC"
                id="check-female" />
                <label for="check-female">ASC : </label>
            </div>
            <div class="gender">
                <input @if(in_array("Others", $pv->sustainability ?? [])) checked @endif type="checkbox"
                id="check-other" value="Others" />
                <label for="check-other">Others : </label>
            </div>
        </div>
    </div>

    @if(!isset($alv))
    <a href="/dashboard/profile/vendor/edit">
        <button type="button">Edit</button>
    </a>
    @endif
</form>