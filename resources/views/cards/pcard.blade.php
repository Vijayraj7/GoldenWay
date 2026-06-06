<div id="pscrd" class="row mb-5">

</div>
<script>
    var loadedx = false;
    var selectedIndex = 0;
    var alrbol = false;
    function removeDuplicates(arr) {
        return arr.filter((item,
            index) => arr.indexOf(item) === index);
    }
    // var alps = localStorage.getItem("ps"); fn
    var alps = '{!! $aaps ?? $ps !!}';
    console.log(alps);
    var xallp = [];
    var allp = [];
    if (alps != null) {
        allp = JSON.parse(alps);
    }
    var types = [];
    var typessl = [];
    var alsbs = [];
    var xalsbs = [];
    // mksbb();
    // function mksbb() {
    for (var i = 0; i < allp.length; i++) {
        allp[i]['oldprice'] = allp[i]['oldprice'] ?? allp[i]['price'];
        allp[i]['inxd'] = i;
        if ((allp[i]['count'] == allp[i]['aprices'][0]['c']) && (allp[i]['price'] == allp[i]['aprices'][0]['p'])) { } else {
            allp[i]['aprices'].splice(0, 0, { 'c': allp[i]['count'], 'p': allp[i]['price'] });
        }
        types.push(allp[i]['type']);
    }
    types = removeDuplicates(types);
    for (var ikl = 0; ikl < types.length; ikl++) {
        var cxl = allp.filter(function (product) { return product['type'] == types[ikl]; });
        for (var i = 0; i < cxl.length; i++) {
            for (var jk = 0; jk < cxl[i]['subs'].length; jk++) {
                var elm = cxl[i]['subs'][jk];
                if (alsbs[ikl] == null) {
                    alsbs[ikl] = [];
                }
                if (alsbs[ikl][jk] == null) {
                    alsbs[ikl][jk] = [elm];
                } else {
                    alsbs[ikl][jk].push(elm);
                }
            }
        }
    }
    // for (var ikl = 0; ikl < types.length; ikl++) {
    for (var s1 = 0; s1 < alsbs.length; s1++) {
        for (var s2 = 0; s2 < alsbs[s1].length; s2++) {
            alsbs[s1][s2] = removeDuplicates(alsbs[s1][s2]);
        }
    }

    // }
    // alert(JSON.stringify(alsbs));
    // }
    xallp = allp;
    xalsbs = alsbs;
    scpo();
    posb();
    function poschanger(i, j, k) {
        // alert(i.toString() + j.toString() + k.toString());
        allp[i]['params'][j]['sl'] = k;
        posb();
    }
    function alsbchanx() {
    }
    function onsizchangex(ni, vl) {
        allp[ni]['apsl'] = Number(vl);
        posb();
    }
    function alsbchanger(j, k, ikl) {
        var alx = [];
        // alert(ikl);
        // alert(j);
        // alert(JSON.stringify(alsbs));
        var ok = alsbs[ikl][j]['sl'] ?? 0;
        alsbs[ikl][j]['sl'] = k;
        console.log('lk');
        for (var dc = 0; dc < alsbs[ikl].length; dc++) {
            var ssl = (alsbs[ikl][dc]['sl'] ?? 0);
            alx[dc] = ssl;
        }
        var tcx = [];
        var xz = 0;
        while (tcx.length == 0) {
            tcx = allp.filter(function (product) {
                var isd = true;
                // .forEach(e => {
                for (var dc = 0; dc < (alsbs[ikl].length - xz); dc++) {
                    var e = product['subs'][dc] ?? '';
                    var ssl = (alsbs[ikl][dc]['sl'] ?? 0);
                    if (ssl != -1) {
                        // console.log(e + ' fs');
                        // console.log(alsbs[ikl][dc][ssl] + 'ss');
                        if (e != alsbs[ikl][dc][ssl]) {
                            isd = false;
                        } else {
                            // console.log(alsbs[ikl][dc][ssl] + '== = ==' + e);
                        }
                    }

                }
                // });
                return isd;
            });
            xz++;
        }
        if (tcx.length > 0) {

            var xvalp = allp.filter(function (product) { return product['type'] == tcx[0]['type'] });
            var sc = xvalp.findIndex(function (prod) {
                return prod['id'] == tcx[0]['id'];
            });
            var ikll = types.findIndex(function (typ) {
                return typ == tcx[0]['type'];
            });
            selectedIndex = sc;
            typessl[ikll] = sc;
            // alert('typessl[' + ikll + '] = ' + sc + ';');
            alsbs[ikl][j]['sl'] = k;
            posb();
        } else {
            alsbs[ikl][j]['sl'] = ok;
            // alert(JSON.stringify(tcx));
        }
    }
    function calculatePercentage(firstNumber, secondNumber) {
        const percentage = ((secondNumber - firstNumber) / Math.abs(firstNumber)) * 100;

        if (percentage > 0) {
            return `style="color:green;">+ ${percentage.toFixed(2)}% ↑`;
        } else if (percentage < 0) {
            return `style="color:red;">- ${Math.abs(percentage).toFixed(2)}% ↓`;
        } else {
            return 'style="color:green;">0%';
        }
    }
    function scpo() {
        var prt = `<div class="containerpr">
                   <div class="scroll-contentpr">`;
        for (var i = 0; i < allp.length; i++) {
            var pr = posb(null, null, i);
            var opr = posb(null, null, i, 'oldprice');
            var nm = calculatePercentage(pr, opr);
            prt += ` <div class="itempr">
                <img style="height:14px;" src="${allp[i]['img']}">
            <p>${allp[i]['name']}</p>
            <p id="prtrai"${nm}</p>
            </div> 
           `;
        }
        prt += '</div> </div>';
        if (document.getElementById('viepr') != null) {
            document.getElementById('viepr').innerHTML = prt;
        }
    }
    function posb(clin, oldi, slin, prm) {
        // var c= null;
        // var p =null;
        // if(clin != null){
        //     c= xallp[clin]['count'];
        // }
        // alert(JSON.stringify(typessl));
        var pscrd = document.getElementById("pscrd");
        var pst = "";
        // for (var i = 0; i < allp.length; i++) {

        for (var ikl = 0; ikl < types.length; ikl++) {
            var sxz = typessl[ikl] ?? 0;
            var i = oldi ?? slin ?? sxz;

            // if (allp[i]['type'] != types[ikl]) {
            //     break;
            // }
            var xvalp = [];
            var valp = null;
            if (oldi != null) {
                xvalp = allp.filter(function (product) { return product['inxd'] == oldi; });
                if (xvalp.length == 0) {
                    alert(oldi);
                }
                i = 0;
                valp = xvalp[0];
            } else if (slin != null) {
                // alert(slin);
                xvalp = allp.filter(function (product) { return product['inxd'] == slin; });
                if (xvalp.length == 0) {
                    alert(slin);
                }
                i = 0;
                valp = xvalp[0];
            } else {
                xvalp = allp.filter(function (product) { return product['type'] == types[ikl]; });
                if (xvalp.length == 0) {
                    alert(types[ikl]);
                }
                i = sxz;
                valp = xvalp[sxz];
                if (valp == null) {
                    alert(ikl.toString() + ' ' + sxz + ' vc');
                    alert(JSON.stringify(xvalp));
                }
            }

            // mksbb();
            // alsbs = [];
            // for (var ikl = 0; ikl < types.length; ikl++) {
            // var cxl = allp.filter(function (product) { return product['type'] == types[ikl]; });
            // for (var ix = 0; ix < cxl.length; ix++) {
            //     for (var jk = 0; jk < cxl[ix]['subs'].length; jk++) {
            //         var elm = cxl[ix]['subs'][jk];
            //         if (alsbs[ikl] == null) {
            //             alsbs[ikl] = [];
            //         }
            //         if (alsbs[ikl][jk] == null) {
            //             alsbs[ikl][jk] = [elm];
            //         } else {
            //             alsbs[ikl][jk].push(elm);
            //         }
            //     }
            // }
            // }
            // for (var ikl = 0; ikl < types.length; ikl++) {
            // for (var s1 = 0; s1 < alsbs.length; s1++) {
            //     for (var s2 = 0; s2 < alsbs[s1].length; s2++) {
            //         alsbs[s1][s2] = removeDuplicates(alsbs[s1][s2]);
            //     }
            // }
            // alert(JSON.stringify(alsbs));
            var price = Number(valp[prm ?? 'price']);
            var tprice = Number(valp[prm ?? 'price']);
            var tcprice = Number(valp[prm ?? 'price']);
            var count = Number(valp['count']);
            var tcount = Number(valp['count']);
            var subst = valp['type'];
            if (valp['aprices'] == null) {
                // if (product['aprices'] == null) {
                valp['aprices'] = [{ 'c': tcount.toString(), 'p': price.toString() }];
                // }
            }
            if (clin != null) {
                var c = clin[0];
                var p = clin[1];
                count = Number(c);
                tcount = Number(c);
                price = Number(p);
                tprice = Number(p);
                tcprice = Number(p);
            } else
                if (valp['apsl'] != null) {
                    var apsl = Number(valp['apsl']);
                    count = Number(valp['aprices'][apsl]['c']);
                    tcount = Number(valp['aprices'][apsl]['c']);
                    price = Number(valp['aprices'][apsl]['p']);
                    tprice = Number(valp['aprices'][apsl]['p']);
                    tcprice = Number(valp['aprices'][apsl]['p']);
                }
            var k = 0;
            // for (var b = 0; b < allp[i]['subs'].length; b++) {
            //     subst += ' > ' + allp[i]['subs'][b];
            // }
            for (var j = 0; j < valp['params'].length; j++) {
                if (valp['params'][j]['sl'] == null) {
                    valp['params'][j]['sl'] = 0;
                }
            }


            for (var j = 0; j < valp['params'].length; j++) {
                if (valp['params'][j]['sl'] == null) {
                    valp['params'][j]['sl'] = 0;
                }
                if (valp['params'][j]['sl'] != null) {
                    // get the selected option to k
                    console.log('f' + valp['params'][j]['sl']);
                    k = valp['params'][j]['sl'];
                } else {
                    console.log('s' + valp['params'][j]['sl']);
                    valp['params'][j]['sl'] = 0;
                    console.log('t' + valp['params'][j]['sl']);
                    // get the selected option to k
                    k = valp['params'][j]['sl'];
                }
                var flx = valp['params'][j]['sl'] ?? 0;
                var tnum = Number(valp['params'][j]['types'][flx]['num']);
                var tcnum = Number(valp['params'][j]['types'][flx]['num']);
                var maineff = valp['params'][j]['types'][flx]['eff'];
                var netrec = Number(valp['params'][j]['types'][flx]['rec'] ?? '0');
                var netinc = Number(valp['params'][j]['types'][flx]['inc'] ?? '0');
                var netcoch = valp['netcount'] ?? 't';
                var netwech = valp['netweight'] ?? 't';
                console.log(netrec.toString() + ' ...rec..@ ');
                console.log(netinc.toString() + ' ..inc... ');
                // for (var k = 0; k < allp[i]['params'][j]['types'].length; k++) {

                if ((netcoch != 't') || (netwech != 't')) {
                    var glaz = Number(valp['glaze'] ?? '10');
                    var las = 0;
                    var varg = 1 - (glaz / 100);
                    if (netrec == 0) {
                        var slx = valp['params'][j]['sl'] ?? 0;
                        var nm = valp['params'][j]['types'][slx]['num'];

                        if (netcoch != 't') {
                            console.log('=0 netcoch');
                            tcnum = nm / varg;
                        }

                        if (netwech != 't') {
                            console.log('=0 netwech');
                            tnum = nm / varg;
                        }
                    } else {
                        var nm = netrec;
                        var afnm = nm / varg;
                        if (netcoch != 't') {

                            console.log('!0 netcosh');
                            tcnum = (1 / ((100) / (afnm * netinc))) / (varg);
                        }

                        if (netwech != 't') {
                            console.log('!0 netwech');
                            tnum = (1 / ((100) / (afnm * netinc))) / (varg);
                        }
                    }
                }
                // var d16 = netrec / ;

                // console.log('m' + allp[i]['params'][j]['types'][k]['pt']);
                console.log(tcnum.toString() + ' .....@ ');
                console.log(tnum.toString() + ' ..... ');
                if (valp['params'][j]['types'][k]['pt'] == 'per') {

                    if (maineff == 'b') {
                        // if effect both price and count
                        tprice = tprice / tnum * 100;
                        tcprice = tcprice / tcnum * 100;
                    } else if (maineff == 'p') {
                        // if effect price
                        tprice = tprice / tnum * 100;
                    } else if (maineff == 'c') {
                        // if effect count
                        tcprice = tcprice / tcnum * 100;
                    }

                } else if (valp['params'][j]['types'][k]['pt'] == 'mper') {

                    if (maineff == 'b') {
                        // if effect both price and count
                        tprice = tprice + ((tnum / 100) * tprice);
                        tcprice = tprice + ((tcnum / 100) * tprice);
                    } else if (maineff == 'p') {
                        // if effect price
                        tprice = tprice + ((tnum / 100) * tprice);
                    } else if (maineff == 'c') {
                        // if effect count
                        tcprice = tprice + ((tcnum / 100) * tprice);
                    }

                } else if (valp['params'][j]['types'][k]['pt'] == 'mul') {

                    if (maineff == 'b') {
                        // if effect both price and count
                        tprice *= tnum;
                        tcprice *= tcnum;
                    } else if (maineff == 'p') {
                        // if effect price
                        tprice *= tnum;
                    } else if (maineff == 'c') {
                        // if effect count
                        tcprice *= tcnum;
                    }

                } else if (valp['params'][j]['types'][k]['pt'] == 'cos') {

                    if (maineff == 'b') {
                        // if effect both price and count
                        tprice += tnum;
                        tcprice += tcnum;
                    } else if (maineff == 'p') {
                        // if effect price
                        tprice += tnum;
                    } else if (maineff == 'c') {
                        // if effect count
                        tcprice += tcnum;
                    } else {
                        tprice += tnum;
                    }

                }
            }

            tcount = tcprice / (price / count);
            console.log(`${tcprice} / {${price} / ${count})`);

            if (loadedx == true) {
                for (var j = 0; j < valp['adds'].length; j++) {
                    var tnum = Number(valp['adds'][j]['num']);
                    if (valp['adds'][j]['pt'] == 'per') {
                        // tprice += ((price / 100) * tnum);
                        tprice = tprice / tnum * 100;
                    } else {
                        tprice += tnum;
                    }
                }
            }

            if (clin != null) {
                // allp = oldp;
                return tcount;
            }

            if (slin != null) {
                // allp = oldp;
                return { 'tprice': tprice, 'tcount': tcount };
            }


            var alvendrs = [];
            // alvendrs =
            for (let cxal = 0; cxal < xvalp.length; cxal++) {
                var product = xvalp[cxal];

                //  allp.filter(function (product) {
                var isd = true;
                // .forEach(e => {
                for (var dc = 0; dc < product['subs'].length; dc++) {
                    var e = valp['subs'][dc] ?? '';
                    if (e != xvalp[cxal]['subs'][dc]) {
                        isd = false;
                    }
                }
                // .forEach(e => {
                for (var dc = 0; dc < product['subs'].length; dc++) {
                    var e = xvalp[cxal]['subs'][dc] ?? '';
                    if (e != valp['subs'][dc]) {
                        isd = false;
                    }
                }
                // });
                if (isd) {
                    product['indx'] = xvalp[cxal]['inxd'];
                    alvendrs.push(product);
                } else {

                }
                // });
            }
            // alert(alvendrs);

            // <li style="color:red;" class="list-group-item">org: ${allp[i]['sym']}${allp[i]['price']}</li>
            //                         <li style="color:red;" class="list-group-item">new: ${allp[i]['sym']}${tprice.toFixed(2)}</li>
            //                         <li class="list-group-item">org: count/${allp[i]['wsym']}  : ${allp[i]['count']}</li>
            //                         <li class="list-group-item">new: count/${allp[i]['wsym']}  : ${tcount.toFixed(2)}</li>`
            // src="/assets/img/elements/7.jpg"
            // <h6 class="mt-2 text-muted">${allp[i]['type']}</h6> 
            // Step 1: Select the element(s) by class name
            var elementss = document.getElementsByClassName('pricevie');
            // Step 2 and 3: Access innerHTML and set new content
            for (var j = 0; j < elementss.length; j++) {
                elementss[j].innerHTML = valp['sym'] + tprice.toFixed(2).toString();
            }

            window.onload = function () {
                console.log(loadedx);
                if (typeof dxAfter === 'function') {
                    if (loadedx == false) {
                        loadedx = true;
                        dxAfter(tprice);
                        posb();
                        console.log(loadedx + "loadedx illa");
                    } else {
                        console.log("loadedx illa");
                    }
                } else {
                    console.log("func illa");
                }
            };

            if (typeof dxAfter === 'function') {
                // The function exists

                // You can now call it or perform other actions
                dxAfter(tprice); // Call the function
            } else {
                // The function does not exist
                // You can handle this case accordingly
                // console.log('The function does not exist.');
            }

            // if (document.getElementById('pricevie') != null) {
            //     document.getElementById('pricevie').innerHTML = 
            // }
            // alert(allp[i]['id'].toString() + ' 1');
            pst += /*html*/`<div class="col-{{$col ?? 6}} col-md-{{$md ?? 4}} prdct${i}" id="iprdct${i}" style="margin-bottom:20px;"> 
                            <div class="card mb3" style="padding-left: 5px; padding-right: 3px;">
                                <div class="{{($spc ?? 'c') == 'c' ? 'col' : 'row'}} g-0">
                                <div class="col-{{($spc ?? 'c') == 'c' ? 12 : 4}}" >
                                <img style="height:150px !important;" class="card-img-top" src="${valp['img']}" alt="Card image cap" />
                         
                                <div style="margin-top: 5px !important; margin-bottom: 2px !important; padding-bottom: 3px !important; padding-top: 5px !important;" class="card-body">
                                  <p style="line-height:14px !important; font-size:14px !important; margin-top: 2px !important; margin-bottom: 3px !important; padding-bottom: 3px !important; padding-top: 3px !important;" class="card-text">${valp['name']}</p>
                                  <h5 style="color:grey; line-height:12px !important; font-size:9px; margin-top: 2px !important; margin-bottom: 3px !important; padding-bottom: 3px !important; padding-top: 5px !important;" class="card-title">${valp['desc']}</h5>
                                  <h5 style="color:brown; line-height:5px !important; font-size:11px; margin-top: 7px !important; margin-bottom: 3px !important; padding-bottom: 3px !important; padding-top: 5px !important;" class="card-title">${subst}</h5>
                                </div>    
                                    </div> 
                                <div class="col-{{($spc ?? 'c') == 'c' ? 12 : 8}}" style="padding-left: 5px !important;">
                                <ul style="margin: 1px !important; padding: 1px !important;" class="list-group list-group-flush">
                    `;

            // alert(allp[i]['id'].toString() + ' 2');
            for (var j = 0; j < alsbs[ikl].length; j++) {
                // if (allp[i]['params'][j]['sl'] == null) {
                //     allp[i]['params'][j]['sl'] = 0;
                // }
                pst += `<li style="padding-left: 0 !important; display:block;"> 
                               
                                    <div class="input-group">
                                        <label style="font-size:11px !important;" class="col-sm-7 col-lg-7 col-md-7 col-xs-7  col-form-label" for="basic-default-type">sub ${j + 1}  </label>

                                <select style="font-size:13px !important; margin: 2px; border:1 !important; border-radius: 22px;" onchange="alsbchanger(${j},(this.selectedIndex - 1),${ikl})" class="form-select" id="cstype">`;

                // alert(JSON.stringify(alsbs[ikl][j]));
                for (var kcx = -1; kcx < alsbs[ikl][j].length; kcx++) {
                    if (kcx == -1) {
                        pst += `  
                             
                             <option ${(alsbs[ikl][j]['sl'] ?? 0) == kcx ? "selected" : ""} value="nil">select</option>

                          `;
                    } else {
                        pst += `  
                             
                                    <option ${(alsbs[ikl][j]['sl'] ?? 0) == kcx ? "selected" : ""} value="${alsbs[ikl][j][kcx]}">${alsbs[ikl][j][kcx]}</option>

                                 `;
                    }
                }
                pst += ` </select>
                            </div>
                          </li>`;
            }

            // alert(allp[i]['id'].toString() + ' 3');
            // pst += `  <li style="line-height:17px !important; font-size:15px; margin-top: 3px !important; margin-bottom: 3px !important; padding-bottom: 3px !important; padding-top: 3px !important;" class="list-group-item">${allp[i]['sym']}${tprice.toFixed(2)}</li>
            //                          <li style="line-height:17px !important; font-size:15px; margin-top: 3px !important; margin-bottom: 6px !important; padding-bottom: 6px !important; padding-top: 3px !important;" class="list-group-item">count/${allp[i]['wsym']}  : ${tcount.toFixed(2)}</li>`;
            @if (!isset($sizx))
                pst += `<li style="padding-left: 0 !important; display:block; border-bottom: 1px solid #d9dee3;"> 
                               
                               <div class="input-group">
                                   <label style="font-size:11px !important;" class="col-sm-7 col-lg-7 col-md-7 col-xs-7  col-form-label" for="basic-default-type">Size</label>

                           <select style="font-size:13px !important; border:none !important;" onchange="onsizchangex(${valp['inxd']},this.value)" class="form-select" id="isizer2">`;
            for (var kcx = 0; kcx < valp['aprices'].length; kcx++) {
                var con = parseInt(posb([valp['aprices'][kcx]['c'], valp['aprices'][kcx]['p']], valp['inxd'], valp));
                console.log(con);
                var nbm1 = con - 5;
                var nbm2 = con + 5;
                if (valp['id'] == 37) {
                    // alert(con);
                }
                pst += `  
                        
                               <option ${valp['apsl'] == kcx ? "selected" : ""} value="${kcx}">${nbm1}/${nbm2}</option>

                            `;
            }
            pst += ` </select>
                       </div>
                     </li>`;
            @endisset

            // alert(allp[i]['id'].toString() + ' 4');
            for (var j = 0; j < valp['params'].length; j++) {
                if (valp['params'][j]['sl'] == null) {
                    valp['params'][j]['sl'] = 0;
                }
                pst += `<li style="padding-left: 0 !important; display:block; border-bottom: 1px solid #d9dee3;"> 

                                    <div class="input-group">
                                        <label style="font-size:11px !important;" class="col-sm-7 col-lg-7 col-md-7 col-xs-7  col-form-label" for="basic-default-type">${valp['params'][j]['name']}  </label>

                                <select style="font-size:13px !important; border:none !important;" onchange="poschanger(${valp['inxd']},${j},this.selectedIndex)" class="form-select" id="cstype">`;
                for (var kcx = 0; kcx < valp['params'][j]['types'].length; kcx++) {

                    pst += `  

                                    <option ${valp['params'][j]['sl'] == kcx ? "selected" : ""} value="${valp['params'][j]['types'][kcx]['tname']}">${valp['params'][j]['types'][kcx]['tname']}</option>

                                 `;
                }
                pst += ` </select>
                            </div>
                          </li>`;
            }
            // pst += '<li style="display:block; padding-left:1.5em; line-height:9px !important; font-size:13px; margin-top: 3px !important; margin-bottom: 3px !important; padding-bottom: 3px !important; padding-top: 3px !important;"> Additional charges </li>';
            for (var j = 0; j < valp['adds'].length; j++) {

                pst += `<li style="padding-left:1.5em; line-height:6px !important; font-size:13px; margin-top: 5px !important; margin-bottom: 3px !important; padding-bottom: 3px !important; padding-top: 5px !important;" class="list-group-item">
                                     + ${valp['adds'][j]['name']} :  ${valp['adds'][j]['num'] == 'per' ? "%" : valp['sym']}${valp['adds'][j]['num']}
                                   </li>`;
            }

            pst += '<br>';

            // pst += '<li style="display:block; padding-left:1.5em; line-height:9px !important; font-size:13px; margin-top: 3px !important; margin-bottom: 3px !important; padding-bottom: 3px !important; padding-top: 3px !important;"> Additional charges </li>';
            for (var j = 0; j < alvendrs.length; j++) {
                // alert(alvendrs[j]['indx'].toString() + ' m');
                var pprc = posb(null, null, alvendrs[j]['indx'])['tprice'].toFixed(2);
                var ppcont = posb(null, null, alvendrs[j]['indx'])['tcount'].toFixed(2);
                pst += `<li style="padding-left:1.5em; line-height:6px !important; font-size:13px; margin-top: 5px !important; margin-bottom: 3px !important; padding-bottom: 3px !important; padding-top: 5px !important;" class="list-group-item">
                                   vendor ${(j + 1)} :  ${ppcont}${alvendrs[j]['wsym']} /  ${alvendrs[j]['sym']}${pprc}

                                  @if($t == 'c')
                                    <a href="/checkout/${alvendrs[j]['id']}" class="card-link">Check out</a>
                                  @endif

                                   </li>`;
            }

            pst += `
                                </ul> 
                                <div class="card-body" style="padding: 1.5rem 0 1.5rem 0;">

                                    @if($t == 'v')
                                    <a class="card-link btn btn-link" href="/dashboard/edit/${valp['id']}">Select</a>
                                    @endif

                                    @if($t == 'v')
                                      <form onsubmit="return confirmSubmission('${valp['name']}')" class="card-link" action="/deleteproduct" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="${valp['id']}">
                                        <button style="color: red !important;" type="submit" class="btn btn-link">Delete</button>
                                      </form>
                                    @endif


                                </div>
                              </div>
                              </div>
                            </div>
                        </div>`;
        }
        pscrd.innerHTML = pst;
        // alert(alrbol);
        // if (alrbol == false) {
        //     // alert('cx');
        //     alrbol = true;
        //     for (var ikl = 0; ikl < types.length; ikl++) {
        //         for (var alcx = 0; alcx < alsbs[ikl].length; alcx++) {
        //             alsbchanger(alcx, -1, ikl);
        //         }
        //     }
        // }
    }
</script>
<script>
    function confirmSubmission(nam) {
        var confirmation = confirm(`Are you sure you want to delete product - ${nam}?`);
        return confirmation;
    }
</script>
<style>
    .list-group-item {
        padding: 0 !important;
    }
</style>

<!-- <h5 onclick="ondel()" class="card-link">Delete</h5> -->
<style>
    /* .containerpr {
        overflow: auto;
        white-space: nowrap;
    } */
    .containerpr {
        background-color: rgb(33, 33, 33);
        width: 100%;
        overflow: hidden;
        border: 1px solid #ccc;
    }

    .scroll-contentpr {
        white-space: nowrap;
        animation: scroller 30s linear infinite;
        animation-direction: alternate;
    }

    @keyframes scroller {
        0% {
            transform: translateX(10%);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .containerpr::-webkit-scrollbar {
        width: 0 !important
    }

    .image-container::-webkit-scrollbar {
        width: 0 !important
    }

    .itempr {
        /* background-color: red; */
        display: inline-block;
        color: white;
        text-align: center;
        margin-left: 4px;
        margin-right: 4px;
        padding: 14px;
        text-decoration: none;
        font-size: 13px;
    }

    .itempr p {
        display: inline-block;
        color: white;
        margin-right: 4px;
    }

    #viepr {
        height: 57px;
        overflow: hidden;
    }
</style>